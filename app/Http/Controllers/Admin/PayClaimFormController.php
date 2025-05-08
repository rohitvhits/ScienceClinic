<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\SubjectHelper;
use Illuminate\Http\Request;
use App\Models\PayClaimForm;
use App\Models\PayClaimFormDetails;
use App\Models\TutorForm;
use App\Models\TutorLevelDetail;
use App\Models\TutorStudent;
use App\Models\User;
use Validator;
use URL;

use App\Helpers\TutorLevelDetailHelper;
use App\Helpers\ParentDetailHelper;

class PayClaimFormController extends Controller
{
    public $successStatus =200;

    public function index()
    {
       return view('admin.pay_claim_form.list');
    }
    public function ajaxList(Request $request){
        $data['page'] = $request->page;
        $name = $request->name;
        $student_name = $request->student_name;
        $created_date = $request->created_date;
        $query = PayClaimForm::whereNull('deleted_at')->where([['pay_status','=','Pending']]);
        if($name !=''){
            $tname=User::where('type', 2)->whereNull('deleted_at')->where('first_name','LIKE','%'.$name.'%')->get(['id']);
            $tname=json_decode($tname);
            $idCats = array_column($tname, 'id');
            $query->whereIn('teacher_id', $idCats);
        }
        if($student_name !=''){
            /*
            $sname=User::where('type', 3)->whereNull('deleted_at')->where('first_name','LIKE','%'.$student_name.'%')->get(['id']);
            $sname=json_decode($sname);
            $sname = array_column($sname, 'id');
            $fids = PayClaimFormDetails::whereNull('deleted_at')->whereIn('student_id', $sname)->get(['form_id']);
            */
            $fids = PayClaimFormDetails::whereNull('deleted_at')->where('student_name','LIKE','%'.$student_name.'%')->get(['form_id']);
            $fids=json_decode($fids);
            $fids = array_column($fids, 'form_id');
            $query->whereIn('id', $fids);
        }
        if($created_date !=''){
            $explode = explode('-',$created_date);
            $query->whereDate('created_at','>=',date('Y-m-d',strtotime($explode[0])))->whereDate('created_at','<=',date('Y-m-d',strtotime($explode[1])));
        }
        $data['query'] = $query->orderBy('id','desc')->paginate(10);
        return view('admin.pay_claim_form.list_ajax',$data);
    }
    public function viewDetails($id){
        $data = PayClaimForm::whereNull('deleted_at')->where('id',$id)->first();
        $details = PayClaimFormDetails::whereNull('deleted_at')->where([['form_id','=',$id]])->get();
        $teacher = User::where('id','=',$data->teacher_id)->first();
        // $teacher_subject_list = TutorLevelDetailHelper::getListTutorWithPaginate($data->teacher_id);
        $teacher_subject_list = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.id as subjectId,level.id as levelId,sb.main_title,GROUP_CONCAT(level.title) as level_name,level.title')
        ->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })
        ->where('sc_tutor_level_details.tutor_id',$data->teacher_id)
        ->whereNull('sb.deleted_at')
        ->groupBy('sc_tutor_level_details.subject_id')
        ->orderBy('sc_tutor_level_details.id','DESC')->get();;
        // $subject_list = SubjectHelper::getAllSubjectList();
        // $parentslist = User::where('type', 3)->whereNull('deleted_at')->orderBy('first_name', 'asc')->get(['id','first_name','last_name']);
        $userName=$teacher->first_name;
        if(!empty($teacher->last_name))
        {
            $userName .= ' '.$teacher->last_name;
        }
        // $parentslist = TutorForm::where([['tutor_name', '=', $userName]])->orderBy('student_name', 'asc')->get(['student_name']);
        $parentslist = TutorStudent::leftjoin('sc_student_master', 'sc_student_master.id','=','sc_tutor_student.student_id')->where([['sc_tutor_student.tutor_id','=',$data->teacher_id]])->orderBy('sc_student_master.student_name', 'asc')->select(['sc_student_master.id','sc_student_master.student_name'])->get();
        $hrs = PayClaimForm::whereNull('deleted_at')->where('teacher_id','=',$data->teacher_id)->get();
        if($hrs)
        {
            $totalHrs = $hrs->sum('total_hrs');
        }
        else
        {
            $totalHrs = 0;
        }
        return view('admin.pay_claim_form.detail', compact('data','details','totalHrs','teacher','parentslist','teacher_subject_list'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'week'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>201 ,'message'=>$validator->errors()->first()]);
        } else {
            $record = PayClaimForm::where([['id', $request->edit_id]])->first();
            $record->total_hrs = $request->totalHrs;
            $record->total_euro = $request->totalRate;
            $res = $record->save();
            if ($res == 1) 
            {
                $delete2=PayClaimFormDetails::where('form_id', $request->edit_id)->delete();
                foreach ($request->studentName as $key => $value) {
                    $tempS=explode('0_0', $value);
                    $student_id=$tempS[0];
                    $student_name=$tempS[1];
                    $add=new PayClaimFormDetails;
                    $add->form_id=$record->id;
                    $add->student_id=$student_id;
                    $add->student_name=$student_name;
                    $add->subject_id=$request->subjectName[$key];
                    $add->lesson_date=$request->lsnDate[$key];
                    $add->lession_time_start=$request->lsnTimeStart[$key];
                    $add->lession_time_end=$request->lsnTimeEnd[$key];
                    $add->no_hrs=$request->lsnHrs[$key];
                    $add->rate_per_hrs=$request->lsnRate[$key];
                    $add->save();
                }
                return response()->json(['status'=>200, 'message'=>'success']);
            }
            else
            {
                return response()->json(['status'=>201, 'message'=>'Failed to update']);
            }
        }
    }

    public function confirmPay($id){
        $userId = Auth()->user();
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['pay_status'] = 'Paid';
        $update = PayClaimForm::where('id', '=', $id)->update($data);
        if ($update) {
            return response()->json([
                'message' => trans('messages.UpdateSuccessfully')
            ]);
            }
            else {
            return response()->json([
                'message' =>  trans('messages.error')
            ]);
        }
    }

    public function destroy($id){
        $userId = Auth()->user();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $userId['id'];
        $update = PayClaimForm::where('id', '=', $id)->update($data);
        if ($update) {
            return response()->json([
                'message' => trans('messages.deletedSuccessfully')
            ]);
            }
            else {
            return response()->json([
                'message' =>  trans('messages.error')
            ]);
        }
    }
}

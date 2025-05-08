<?php

namespace App\Http\Controllers\Frontend\Tutor;
use App\Helpers\TextBooksHelper;
use App\Helpers\TutorSubjectDetailHelper;
use App\Helpers\TutorLevelDetailHelper;
use App\Helpers\SubjectHelper;
use App\Helpers\ParentDetailHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PayClaimForm;
use App\Models\PayClaimFormDetails;
use App\Models\TutorForm;
use App\Models\TutorLevelDetail;
use App\Models\StudentMaster;
use App\Models\TutorStudent;
use App\Models\User;
use Validator;
use Session;
use Carbon\Carbon;

class TutorPayClaimFormController extends Controller
{
    public $successStatus =200;
    public function index()
    {
        return view('frontend.tutor.tutor-pay-claim-form');
    }
    public function ajaxList(Request $request){
        $auth = auth()->user();
        $userId = $auth['id'];
        $data['page'] = $request->input('page');
        $created_date = $request->input('created_date');
        $title = $request->input('title');
        $dateS = Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m');
        $dateS .= '-'.date('d');
        $query = PayClaimForm::whereNull('deleted_at')->where([['teacher_id','=',$userId]])->whereDate('created_at', '>=', $dateS);
        $data['query'] = $query->paginate(10);
        return view('frontend.tutor.tutor-pay-claim-form-ajax-list',$data);
    }
    public function testFun()
    {
        // 13 dec 2024
        $mytime = Carbon::now();
        $dayName = $mytime->format('l');
        $today=$mytime->toDateTimeString();
        if($dayName=='Friday')
        {
            $fri1 = Carbon::parse('this friday')->toDateString();
            $thu1 = Carbon::parse('next thursday')->addDays(7)->toDateString();
            $fri2 = Carbon::parse('next friday')->addDays(7)->toDateString();
            $thu2 = Carbon::parse('next thursday')->addDays(14)->toDateString();
            $fri3 = Carbon::parse('next friday')->addDays(14)->toDateString();
            $thu3 = Carbon::parse('next thursday')->addDays(21)->toDateString();
            $fri4 = Carbon::parse('next friday')->addDays(21)->toDateString();
            $thu4 = Carbon::parse('next thursday')->addDays(28)->toDateString();
            $one=$fri1.' - '.$thu1;
            $two=$fri2.' - '.$thu2;
            $three=$fri3.' - '.$thu3;
            $four=$fri4.' - '.$thu4;
            $weekList=array($one,$two,$three,$four);
        }
        else
        {
            $fri1 = Carbon::parse('last friday')->toDateString();
            $thu1 = Carbon::parse('this thursday')->toDateString();
            $fri2 = Carbon::parse('this friday')->toDateString();
            $thu2 = Carbon::parse('this thursday')->addDays(7)->toDateString();
            $fri3 = Carbon::parse('next friday')->addDays(7)->toDateString();
            $thu3 = Carbon::parse('next thursday')->addDays(14)->toDateString();
            $fri4 = Carbon::parse('next friday')->addDays(14)->toDateString();
            $thu4 = Carbon::parse('next thursday')->addDays(21)->toDateString();
            $one=$fri1.' - '.$thu1;
            $two=$fri2.' - '.$thu2;
            $three=$fri3.' - '.$thu3;
            $four=$fri4.' - '.$thu4;
            $weekList=array($one,$two,$three,$four);
        }
        dd($weekList);
    }
    public function create()
    {
        $auth = auth()->user();
        if(empty($auth)){
            return redirect('/tutor-login');
        }
        $userId = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
            $userName=trim($userName);
        }
        $hrs = PayClaimForm::whereNull('deleted_at')->where('teacher_id','=',$userId)->get();
        if($hrs)
        {
            $data['totalHrs'] = $hrs->sum('total_hrs');
        }
        else
        {
            $data['totalHrs'] = 0;
        }
        $data['teacher_subject_list'] = $query = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.id as subjectId,level.id as levelId,sb.main_title,GROUP_CONCAT(level.title) as level_name,level.title')
        ->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })
        ->where('sc_tutor_level_details.tutor_id',$userId)
        ->whereNull('sb.deleted_at')
        ->groupBy('sc_tutor_level_details.subject_id')
        ->orderBy('sc_tutor_level_details.id','DESC')->get();

        // $data['teacher_subject_list'] = TutorLevelDetailHelper::getListTutorWithPaginate($userId);
        // $data['subject_list'] = SubjectHelper::getAllSubjectList();
        // $data['parentslist'] = TutorForm::where([['tutor_name', '=', $userName]])->orderBy('student_name', 'asc')->get(['student_name']);
        $data['parentslist'] = TutorStudent::leftjoin('sc_student_master', 'sc_student_master.id','=','sc_tutor_student.student_id')->where([['sc_tutor_student.tutor_id','=',$userId]])->orderBy('sc_student_master.student_name', 'asc')->select(['sc_student_master.id','sc_student_master.student_name'])->get();
        $mytime = Carbon::now();
        $dayName = $mytime->format('l');
        $today=$mytime->toDateTimeString();
        if($dayName=='Friday')
        {
            $fri1 = Carbon::parse('this friday')->toDateString();
            $thu1 = Carbon::parse('next thursday')->addDays(7)->toDateString();
            $fri2 = Carbon::parse('next friday')->addDays(7)->toDateString();
            $thu2 = Carbon::parse('next thursday')->addDays(14)->toDateString();
            $fri3 = Carbon::parse('next friday')->addDays(14)->toDateString();
            $thu3 = Carbon::parse('next thursday')->addDays(21)->toDateString();
            $fri4 = Carbon::parse('next friday')->addDays(21)->toDateString();
            $thu4 = Carbon::parse('next thursday')->addDays(28)->toDateString();
            $one=$fri1.' - '.$thu1;
            $two=$fri2.' - '.$thu2;
            $three=$fri3.' - '.$thu3;
            $four=$fri4.' - '.$thu4;
            $weekList=array($one,$two,$three,$four);
        }
        else
        {
            $fri1 = Carbon::parse('last friday')->toDateString();
            $thu1 = Carbon::parse('this thursday')->toDateString();
            $fri2 = Carbon::parse('this friday')->toDateString();
            $thu2 = Carbon::parse('this thursday')->addDays(7)->toDateString();
            $fri3 = Carbon::parse('next friday')->addDays(7)->toDateString();
            $thu3 = Carbon::parse('next thursday')->addDays(14)->toDateString();
            $fri4 = Carbon::parse('next friday')->addDays(14)->toDateString();
            $thu4 = Carbon::parse('next thursday')->addDays(21)->toDateString();
            $one=$fri1.' - '.$thu1;
            $two=$fri2.' - '.$thu2;
            $three=$fri3.' - '.$thu3;
            $four=$fri4.' - '.$thu4;
            $weekList=array($one,$two,$three,$four);
        }
        $data['weekList'] = $weekList;
        // $data['today'] = $today;
        return view('frontend.tutor.tutor-add-pay-claim-form',$data);
    }

    public function store(Request $request)
    {   
        $auth = auth()->user();
        if(empty($auth)){
            return redirect('/tutor-login');
        }
        $userId = $auth['id'];
        $validator = Validator::make($request->all(), [
            'week'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>201 ,'message'=>$validator->errors()->first()]);
        } else {
            $wse=explode(' - ', $request->week);
            $record = new PayClaimForm;
            $record->teacher_id = $userId;
            $record->week_date = $request->week;
            $record->start_date = $wse[0];
            $record->end_date = $wse[1];
            $record->total_hrs = $request->totalHrs;
            $record->total_euro = $request->totalRate;
            $update = $record->save();            
            if($update){
                foreach ($request->studentName as $key => $value) {
                    if(!empty($value))
                    {
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
                }
                return response()->json(['status'=>200, 'message'=>'success']);
            }else{
                return response()->json(['status'=>201, 'message'=>'Failed to added']);
            }
        }
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $auth = auth()->user();
        if(empty($auth)){
            return redirect('/tutor-login');
        }
        $userId = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
        }
        $hrs = PayClaimForm::whereNull('deleted_at')->where('teacher_id','=',$userId)->get();
        if($hrs)
        {
            $data['totalHrs'] = $hrs->sum('total_hrs');
        }
        else
        {
            $data['totalHrs'] = 0;
        }
        $data['data'] = PayClaimForm::whereNull('deleted_at')->where([['teacher_id','=',$userId],['id','=',$id]])->first();
        $data['details'] = PayClaimFormDetails::whereNull('deleted_at')->where([['form_id','=',$id]])->get();
        $data['teacher_subject_list'] = $data['teacher_subject_list'] = $query = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.id as subjectId,level.id as levelId,sb.main_title,GROUP_CONCAT(level.title) as level_name,level.title')
        ->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })
        ->where('sc_tutor_level_details.tutor_id',$userId)
        ->whereNull('sb.deleted_at')
        ->groupBy('sc_tutor_level_details.subject_id')
        ->orderBy('sc_tutor_level_details.id','DESC')->get();
        // $data['subject_list'] = TutorLevelDetailHelper::getListTutorWithPaginate($userId);
        // $data['parentslist'] = TutorForm::where([['tutor_name', '=', $userName]])->orderBy('student_name', 'asc')->get(['student_name']);
        $data['parentslist'] = TutorStudent::leftjoin('sc_student_master', 'sc_student_master.id','=','sc_tutor_student.student_id')->where([['sc_tutor_student.tutor_id','=',$userId]])->orderBy('sc_student_master.student_name', 'asc')->select(['sc_student_master.id','sc_student_master.student_name'])->get();
        return view('frontend.tutor.tutor-edit-pay-claim-form',$data);
    }

    public function update(Request $request)
    {
        $auth = auth()->user();
        if(empty($auth)){
            return redirect('/tutor-login');
        }
        $userId = $auth['id'];
        $validator = Validator::make($request->all(), [
            'week'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>201 ,'message'=>$validator->errors()->first()]);
        } else {
            $record = PayClaimForm::where([['id', $request->edit_id],['teacher_id','=',$userId]])->first();
            $record->total_hrs = $request->totalHrs;
            $record->total_euro = $request->totalRate;
            $res = $record->save();
            if ($res == 1) 
            {
                $delete2=PayClaimFormDetails::where('form_id', $request->edit_id)->delete();
                foreach ($request->studentName as $key => $value) {
                    if(!empty($value))
                    {
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
                }
                return response()->json(['status'=>200, 'message'=>'success']);
            }
            else
            {
                return response()->json(['status'=>201, 'message'=>'Failed to update']);
            }
        }
    }

    public function destroy($id)
    {
        $auth = auth()->user();
        if(empty($auth)){
            return redirect('/tutor-login');
        }
        $userId = $auth['id'];
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $userId;
        $update = PayClaimForm::where([['teacher_id','=',$userId],['id', '=', $id]])->update($data);
        if ($update) {
            return response()->json(['error_msg' => trans('messages.deletedSuccessfully'), 'data' => array()], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error_msg'),'data' => array()], 500);
        }
    }
}

<?php



namespace App\Http\Controllers\Frontend\Tutor;

use App\Helpers\SubjectHelper;
use App\Helpers\TutorLevelDetailHelper;
use App\Helpers\TutorLevelHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TutorForm;
use App\Models\StudentMaster;
use App\Models\TutorStudent;
use App\Models\TutorLevelDetail;
use App\Models\Country;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TutorSubjectController extends Controller

{
    public $successStatus = 200;
    public function addStudent()
    {
        $auth = Auth::guard('web')->user();
        $userId = $auth['id'];

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
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('frontend.tutor.tutor-add-student', $data);
    }
    public function saveStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_name' => 'required',
            'subject_name' => 'required',
            'level' => 'required',
            'year_group' => 'required',
            'parent_name' => 'required',
            'country' => 'required',
            'parent_mobile' => 'required',
            'parent_email' => 'required',
            'parent_address' => 'required'
        ]);
        if ($validator->fails()) {
            // return response()->json(['error_msg' => $validator->errors()->all(),'data' => array()], 0);
            return response()->json(['error_msg' => $validator->errors()->all(), 'status' => 0]);
        } else {
            $auth = Auth::guard('web')->user();
            $userid = $auth['id'];
            $userName = $auth['first_name'];
            if(!empty($auth['last_name']))
            {
                $userName .= ' '.$auth['last_name'];
                $userName=trim($userName);
            }
            $hours = 1;
            $startTime = Carbon::parse($request->tuition_time)->format('H:i:s');
            $time = Carbon::parse($request->tuition_time);
            $endTime = $time->addHours($hours)->format('H:i:s');
            $finalEndTime = $endTime;
            $time = $startTime.'-'.$finalEndTime;
            $getCC=Country::where('id',$request->country)->first();
            $cc='';
            if($getCC && isset($getCC->phonecode))
            {
                $cc=$getCC->phonecode;
            }
            $studentFormArray = array(
                'student_name' => $request->student_name,
                'parent_name' => $request->parent_name,
                'country_id' => $request->country,
                'country_code' => $cc,
                'parent_mobile' => $request->parent_mobile,
                'parent_email' => $request->parent_email,
                'parent_address' => $request->parent_address,
                'subject_id' => $request->subject_name,
                'level' => $request->level,
                'year_group' => $request->year_group
            );
            $tutorFormArray = array();
            if(isset($request->eid) && !empty($request->eid))
            {
                $studentFormArray['updated_at'] = date('Y-m-d H:i:s');
                $studentFormArray['updated_by'] = $userid;
                $getSid = TutorStudent::where([['id','=',$request->eid]])->first();
                $sId=$getSid->student_id;
                $saveData = StudentMaster::where([['id','=',$sId]])->update($studentFormArray);   
            }
            else
            {
                $studentFormArray['created_by'] = $userid;
                $insert = new StudentMaster($studentFormArray);
                $saveData = $insert->save();
                $student_id = $insert->id;
                $tutorFormArray['tutor_id'] = $userid;
                $tutorFormArray['student_id'] = $student_id;
                $tutorFormArray['created_by'] = $userid;                
                $addTs = new TutorStudent($tutorFormArray);
                $saveTs = $addTs->save();
            }
            if ($saveData) {
                return response()->json(['error_msg' => trans('messages.addedSuccessfully'), 'status' => 1]);
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'status' => 0]);
            }
        }
    }    
    public function studentList()
    {
        $auth = Auth::guard('web')->user();
        $id = $auth['id'];
        return view('frontend.tutor.tutor-student');
    }
    public function studentAjaxList(Request $request)
    {
        $auth = Auth::guard('web')->user();
        $id = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
            $userName=trim($userName);
        }
        $data['page'] = $request->page;
        $data['query'] = TutorStudent::leftjoin('sc_student_master', 'sc_student_master.id','=','sc_tutor_student.student_id')->leftjoin('sc_subject_master', 'sc_subject_master.id','=','sc_student_master.subject_id')->where([['sc_tutor_student.tutor_id','=',$id]])->orderBy('sc_tutor_student.id', 'desc')->select(['sc_tutor_student.*','sc_student_master.student_name','sc_student_master.parent_name','sc_student_master.country_id','sc_student_master.country_code','sc_student_master.parent_mobile','sc_student_master.parent_email','sc_student_master.parent_address','sc_student_master.level','sc_student_master.year_group','sc_subject_master.main_title'])->paginate(10);
        return view('frontend.tutor.tutor-student-ajax', $data);
    }
    public function editStudent($eid)
    {
        $auth = Auth::guard('web')->user();
        $id = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
            $userName=trim($userName);
        }
        $data['teacher_subject_list'] = $query = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.id as subjectId,level.id as levelId,sb.main_title,GROUP_CONCAT(level.title) as level_name,level.title')
        ->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })
        ->where('sc_tutor_level_details.tutor_id',$id)
        ->whereNull('sb.deleted_at')
        ->groupBy('sc_tutor_level_details.subject_id')
        ->orderBy('sc_tutor_level_details.id','DESC')->get();

        $tf=TutorStudent::where([['tutor_id','=',$id],['id','=',$eid]])->first();
        $data['formData'] = $tf;
        $data['studentData'] = StudentMaster::where([['id','=',$tf->student_id]])->first();
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('frontend.tutor.tutor-edit-student', $data);
    }
    public function deleteStudent($id)
    {
        $auth = Auth::guard('web')->user();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $auth['id'];
        $update = TutorStudent::where([['id','=',$id]])->update($data);
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
    public function index()
    {
        $auth = Auth::guard('web')->user();
        $id = $auth['id'];
        $this->data['subject'] = SubjectHelper::getAllSubjectList();
        $this->data['level'] = TutorLevelHelper::getAllTutorList();
        $this->data['tutorData'] = $tutorData = TutorLevelDetailHelper::getListTutor($id);
        foreach ($tutorData as $val) {
            $this->data['selectedSubject'][] = $val->subject_id;
            $this->data['selectedLevel'][] = $val->level_id;
        }
        return view('frontend.tutor.tutor-subject', $this->data);
    }
    public function store(Request $request)
    {
        $rules = array(
            'main_subject' => 'required',
            'level' => 'required'
        );
        $messsages = array(
            'main_subject.required' => 'Please select Subject',
            'level.required' => 'Please select Level'
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->fails()) {
            return redirect("/tutor-subject?addpopup=1")
                ->withErrors($validator, 'subject')
                ->withInput();
        } else {
            $auth = Auth::guard('web')->user();
            $id = $auth['id'];
            $level = $request->input('level');
            $subject = $request->input('main_subject');
            foreach ($level as $val) {
                $tutorLevelDetails = array(
                    'tutor_id' => $id,
                    'level_id' => $val,
                    'subject_id' => $subject,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $id
                );
                $insert = TutorLevelDetailHelper::save($tutorLevelDetails);
            }
            if ($insert) {
                Session::flash('success', trans('messages.addedSuccessfully'));
                return redirect('tutor-subject');
            } else {
                Session::flash('error', trans('messages.error'));
                return redirect('tutor-subject');
            }
        }
    }
    public function ajaxList(Request $request)
    {
        $auth = Auth::guard('web')->user();
        $id = $auth['id'];
        $data['page'] = $request->page;
        $data['query'] = TutorLevelDetailHelper::getListTutorWithPaginate($id);
        return view('frontend.tutor.tutor-subject-ajax', $data);
    }
    public function onlineAjaxList(Request $request)
    {
        $auth = Auth::guard('web')->user();
        $id = $auth['id'];
        $data['page'] = $request->page;
        $data['query'] = TutorLevelDetailHelper::getListOnlineSubjectWithPaginate($id);
        return view('frontend.tutor.tutor-online-subject-ajax', $data);
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $auth = Auth::guard('web')->user();
        $userId = $auth['id'];
        $data = TutorLevelDetailHelper::getData($id, $userId);
        return json_encode($data);
    }
    public function editOnlineSubject(Request $request)
    {
        $id = $request->id;
        $auth = Auth::guard('web')->user();
        $userId = $auth['id'];
        $data = TutorLevelDetailHelper::getOnlineSubjectData($id, $userId);
        return json_encode($data);
    }
    public function checkData(Request $request)
    {
        $subjectId = $request->name;
        $levelId = $request->level;
        $tutorId = $request->id;
        $mainId = $request->mainId;
        $checkData = TutorLevelDetailHelper::checkData($subjectId, $levelId, $tutorId, $mainId);
        if ($checkData) {
            return 1;
        } else {
            return 0;
        }
    }
    public function update(Request $request)
    {
        $subjectId = $request->main_subject_edit;
        $levelId = $request->level_edit;
        $mainId = $request->main_id_edit;
        $onlineSubject = $request->online_subject;
        $rules = array(
            'main_subject_edit' => 'required',
            'level_edit' => 'required'
        );
        $messsages = array(
            'main_subject_edit.required' => 'Please select Subject',
            'level_edit.required' => 'Please select Level'
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->fails()) {
            return redirect("/tutor-subject?editpopup=1&id=" . $mainId)
                ->withErrors($validator, 'edit')
                ->withInput();
        } else {
            $auth = Auth::guard('web')->user();
            $id = $auth['id'];
            $delete = TutorLevelDetailHelper::deleteLevelData($id, $subjectId);
            if ($delete) {
                if ($onlineSubject == 1) {
                    foreach ($levelId as $val) {
                        $tutorLevelDetails = array(
                            'tutor_id' => $id,
                            'level_id' => $val,
                            'subject_id' => $subjectId,
                            'created_at' => date('Y-m-d H:i:s'),
                            'created_by' => $id,
                            'website_flag' => 1
                        );
                        $insert = TutorLevelDetailHelper::save($tutorLevelDetails);
                    }
                    if ($insert) {
                        Session::flash('success', trans('messages.updatedSuccessfully'));
                        return redirect('tutor-subject');
                    } else {
                        Session::flash('error', trans('messages.error'));
                        return redirect('tutor-subject');
                    }
                } else {
                    foreach ($levelId as $val) {
                        $tutorLevelDetails = array(
                            'tutor_id' => $id,
                            'level_id' => $val,
                            'subject_id' => $subjectId,
                            'created_at' => date('Y-m-d H:i:s'),
                            'created_by' => $id
                        );
                        $insert = TutorLevelDetailHelper::save($tutorLevelDetails);
                    }
                    if ($insert) {
                        Session::flash('success', trans('messages.updatedSuccessfully'));
                        return redirect('tutor-subject');
                    } else {
                        Session::flash('error', trans('messages.error'));
                        return redirect('tutor-subject');
                    }
                }
            }
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $update = TutorLevelDetailHelper::SoftDelete(array(), array('id' => $id));
        if ($update) {
            Session::flash('success', trans('messages.deletedSuccessfully'));
        } else {
            Session::flash('error', trans('messages.error'));
        }
    }
}

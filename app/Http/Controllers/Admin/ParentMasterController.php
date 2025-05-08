<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Helpers\TutorUniversityDetailHelper;
use App\Helpers\ParentDetailHelper;
use App\Helpers\MailHelper;
use App\Helpers\UserHelper;
use App\Helpers\TutorLevelHelper;
use App\Models\TutorLevelDetail;
use App\Models\SubjectMaster;
use App\Models\StudentMaster;
use App\Models\TutorStudent;
use App\Models\TutorForm;
use App\Models\User;
use App\Models\TutorReview;
use App\Models\TutorLevel;
use App\Models\Country;
use DateInterval;
use DatePeriod;
use DateTime;
use Session;
use DB;

class ParentMasterController extends Controller
{
    public function oldStudentList()
    {
        /*
        $allT=DB::SELECT("SELECT id,first_name,last_name FROM users WHERE deleted_at IS NULL");
        $oldS=DB::SELECT("SELECT id,tutor_name,student_name FROM sc_tutor_form WHERE deleted_at IS NULL GROUP BY tutor_name,student_name");
        foreach ($oldS as $key => $val)
        {
            $snam= $val->student_name;
            $tnam= $val->tutor_name;
            $sid='';
            $tid='';
            $newS=DB::SELECT("SELECT id FROM sc_student_master WHERE student_name='".$snam."'");
            if($newS && !empty($newS[0]->id))
            {
                $sid=$newS[0]->id;
            }
            foreach ($allT as $k2 => $v2) {
                $ntn=$v2->first_name;
                if(!empty($v2->last_name))
                {
                    $ntn.=' '.$v2->last_name;
                }
                if(strtoupper(trim($ntn))==strtoupper(trim($tnam)))
                {
                    $tid=$v2->id;
                }
            }
            echo $sid.' -> '.$snam.' | '.$tid.' -> '.$tnam.'<br>';
            echo "INSERT INTO sc_tutor_student (tutor_id,student_id) VALUES ($tid, $sid)<br><br>";
            /*
            $ins=DB::INSERT("INSERT INTO sc_tutor_student (tutor_id,student_id) VALUES ($tid, $sid)");
            if($ins)
            {
                echo 'done<br>';
            }
            else
            {
                echo $sid.' -> '.$snam.' | '.$tid.' -> '.$tnam.'<br>';
            }
        }*/
        // dd($oldS);
    }
    public function index()
    {
        return view('admin.parent.parent_list');
    }
    public function ajaxList(Request $request)
    {

        $data['page'] = $request->page;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $status = $request->status;

        $created_date = $request->created_date;

        $data['query'] = UserHelper::getParentList($name, $email, $phone, $address, $status, $created_date);

        return view('admin.parent.parent_list_ajax', $data);
    }

    public static function parentDetails($id)
    {

        $data['parents'] = UserHelper::getDetailsById($id);
        if (isset($data['parents']->id)) {

            return view('admin.parent.parent_details', $data);
        } else {

            abort(404);
        }
    }

    public function sendPaymentLinkMail(Request $request)
    {

        if ($request->id != '') {
            $string = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            $rand =  substr(str_shuffle($string), 0, 8);
            $encrypted = Crypt::encrypt($rand);
            $getData = ParentDetailHelper::getInquiryDetails($request->id);
            $update = ParentDetailHelper::update(array('payment_link_flag' => '1', 'payment_token' => $rand, 'updated_at' => date('Y-m-d H:i:s')), array('user_id' => $getData->user_id, 'tutor_id' => $getData->tutor_id, 'subject_id' => $getData->subject_id, 'level_id' => $getData->level_id, 'tuition_day' => $getData->tuition_day, 'tuition_time' => $getData->tuition_time));
            $getUserData = ParentDetailHelper::getUserDetails($request->id);
            if ($getUserData) {
                //send mail to parent for payment
                $html = '<p>Science Clinic Admin has sent you a payment request for ' . $getUserData->subjectDetails->main_title . '.</p>
                <p>Date : ' . date("d/m/Y", strtotime($getUserData->booking_date)) . '.</p>
                <p>Day : ' . ucfirst(trans($getUserData->tuition_day)) . '.</p>
                <p>Start Time : ' . date('h:i A', strtotime($getUserData->teaching_start_time)) . '.</p>
                <p>Please click on the link below to make a secure online payment:</p>
                <h5>Stripe</h5>
                <a href="' . URL::to('/stripe-payment/' . $encrypted) . '"><img src="'.URL::to('images/Stripe-Logo22.png'). '" style="height: 40px; width: 85px;" class="css-class" alt="alt text"></a>
                <br/>
                <h5>Paypal</h5>
                <a href="' . URL::to('/paypal-payment/' . $encrypted) . '"><img src="' . URL::to('images/Paypal-Logo.jpg') . '" class="css-class" style="width: 82px;" alt="alt text"></a>';
                $subject = __('emails.payment_email');
                $BODY = __('emails.payment_email_body', ['USERNAME' => $getUserData->userDetails->first_name, 'HTMLTABLE' => $html]);
                $body_email = __('emails.template', ['BODYCONTENT' => $BODY]);
                $mail = MailHelper::mail_send($body_email, $getUserData->userDetails->email, $subject);

                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function getCalanderBooking(Request $request)
    {
        $data['parent_id'] = $request->id;
        return view('admin.parent.parent_calander_list', $data);
    }
    public function getBooklesson(Request $request)
    {
        $data = ParentDetailHelper::getUserDetails($request->id);
        return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => array($data)], 200);
    }
    public function updateBooklesson(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'days' => 'required',
            'tuition_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error_msg' => $validator->errors()->all(), 'status' => 'inactive', 'data' => array()], 400);
        }
        $currdate = date("Y-m-d");
        $monday = strtotime("last monday");
        $monday = date('w', $monday) == date('w') ? $monday + 7 * 86400 : $monday;
        $sunday = strtotime(date("Y-m-d", $monday) . " +6 days");
        $this_week_sd = date("Y-m-d", $monday);
        $this_week_ed = date("Y-m-d", $sunday);

        $dateRang = self::getDatesFromRange($this_week_sd, $this_week_ed);
        $dateArray = array();
        foreach ($dateRang as $dkey) {
            if ($currdate <= $dkey) {
                $dayname = date('l', strtotime($dkey));
                $dateArray[$dkey] = $dayname;
            }
        }

        $bookDate = date('Y-m-d', strtotime($request->days . ' next week'));

        if (in_array(ucfirst($request->days), $dateArray)) {
            foreach ($dateArray as $key => $val) {
                if (ucfirst($request->days) == $val) {
                    if ($key < date('Y-m-d')) {
                        $bookDate = date('Y-m-d', strtotime($request->days . ' next week'));
                    } else {
                        $bookDate = $key;
                    }
                }
            }
        }

        $data_array = array(

            'tuition_day' => $request->days,
            'tuition_time' => $request->tuition_time,
            'booking_date' => $bookDate,
        );

        $update = ParentDetailHelper::update($data_array, array('id' => $request->input('lesson_id')));
        return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => array()], 200);
    }
    public function getDatesFromRange($start, $end, $format = 'Y-m-d')
    {

        $array = array();
        $interval = new DateInterval('P1D');
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        foreach ($period as $date) {
            $array[] = $date->format($format);
        }


        return $array;
    }
    public function getParentBookLesson(Request $request)
    {
        $data = ParentDetailHelper::getBooklessondata($request->parentID);
        return response()->json($data);
    }
    public function getInquiryDetails(Request $request)
    {

        $data['page'] = $request->page;
        $data['parentStatus'] = $request->parentStatus;
        $tutor_id = $request->tutor_id;
        $data['query'] = ParentDetailHelper::getListwithPaginate($tutor_id);
        return view('admin.parent.tutor_inquiry_list', $data);
    }

    public function destroy($id)
    {

        $update = UserHelper::SoftDelete(array(), array('id' => $id));

        if ($update) {

            return response()->json([

                'message' => trans('messages.deletedSuccessfully')

            ]);
        } else {

            return response()->json([

                'message' =>  trans('messages.notDeleted')

            ]);
        }
    }
    public function getHourlyRate(Request $request)
    {
        $data = ParentDetailHelper::getHourlyRate($request->id);
        return json_encode($data);
    }
    public function addHourlyRate(Request $request)
    {
        $getDetails = ParentDetailHelper::getParentDetailsById($request->id);
        $subjectId = $getDetails->subject_id;
        $levelId = $getDetails->level_id;
        $tutorId = $getDetails->tutor_id;
        $day = $getDetails->tuition_day;
        $time = $getDetails->tuition_time;
        $updateUser = ParentDetailHelper::updateHourlyRate($request->id, $request->rate);
        $getHourlyRateDetails = ParentDetailHelper::getDetailsHourlyRate($subjectId, $levelId, $tutorId, $day, $time);
        foreach($getHourlyRateDetails as $val){
            $updateNotificationFlag = ParentDetailHelper::updateNotificationFlag($val->id);
            $updateUser = ParentDetailHelper::updateHourlyRate($val->id, $request->rate);
        }
        if ($updateUser) {
            return 1;
        } else {
            return 0;
        }
    }

    // student
    public function addStudent()
    {
        $auth = Auth()->user();
        $userId = $auth['id'];
        $data['tutorList'] = User::where('type',2)->whereNull('deleted_at')->orderBy('first_name','asc')->get(['id','first_name','last_name']);
        $data['teacher_subject_list'] = SubjectMaster::whereNull('deleted_at')->orderBy('main_title','ASC')->get();
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('admin.parent.add-student', $data);
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
            return response()->json([
                'error_msg' => $validator->errors()->all(),
                'data' => array()
            ], 400);
        } else {
            $auth = Auth()->user();
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
                $saveData = StudentMaster::where([['id','=',$request->eid]])->update($studentFormArray);   
            }
            else
            {
                $checkExist=StudentMaster::whereNull('deleted_at')->where([['student_name','=',$request->student_name],['parent_mobile', $request->parent_mobile],['parent_email', $request->parent_email]])->first();
                if(empty($checkExist))
                {
                    $studentFormArray['created_by'] = $userid;
                    $tutorFormArray['created_by'] = $userid;
                    $insert = new StudentMaster($studentFormArray);
                    $saveData = $insert->save();
                    $student_id = $insert->id;
                    /*
                    $tutorFormArray['tutor_id'] = $userid;
                    $tutorFormArray['student_id'] = $student_id;
                    $addTs = new TutorStudent($tutorFormArray);
                    $saveTs = $addTs->save();
                    */
                    $pid='';
                    $checkEmail=User::whereNull('deleted_at')->where('email', $request->parent_email)->first();
                    if($checkEmail)
                    {
                        $pid=$checkEmail->id;
                    }
                    $checkPhone=User::whereNull('deleted_at')->where('mobile_id', $request->parent_mobile)->first();
                    if($checkPhone)
                    {
                        if($pid!=$checkPhone->id)
                        {
                            $pid='';
                        }
                    }
                    if(empty($pid))
                    {
                        $userArr = array(
                            'first_name' => $request->parent_name,
                            'type' => 3,
                            'email' => $request->parent_email,
                            'country_id' => $request->country,
                            'country_code' => $cc,
                            'mobile_id' => $request->parent_mobile,
                            'address1' => $request->parent_address,
                            'status' => 'Pending'
                        );
                        $userData = UserHelper::save($userArr);
                    }
                }
                else
                {
                    return response()->json(['error_msg' => trans('messages.error'), 'data' => 'Student alreay registered', 'status' => 2], 200);
                    // return response()->json(['error_msg' => trans('messages.error'), 'status' => 208]);   
                }
            }
            if ($saveData) {
                if(isset($request->eid) && !empty($request->eid))
                {
                    return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'status' => 1]);
                }
                else
                {
                    return response()->json(['error_msg' => trans('messages.addedSuccessfully'), 'status' => 1]);
                }
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'status' => 0]);
            }
        }
    }    
    public function studentList()
    {
        $auth = Auth()->user();
        $id = $auth['id'];
        return view('admin.parent.student-list');
    }
    public function studentAjaxList(Request $request)
    {
        $auth = Auth()->user();
        $id = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
            $userName=trim($userName);
        }
        $data['page'] = $request->page;
        $student_name = $request->student_name;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $created_date = $request->created_date;
        $query = StudentMaster::leftjoin('sc_subject_master', 'sc_subject_master.id','=','sc_student_master.subject_id')->leftjoin('sc_tutor_level', 'sc_tutor_level.id','=','sc_student_master.level');
        if ($student_name != '') {
            $query->where('sc_student_master.student_name', 'LIKE', '%' . $student_name . '%');
        }
        if ($name != '') {
            $query->where('sc_student_master.parent_name', 'LIKE', '%' . $name . '%');
        }
        if ($email != '') {
            $query->where('sc_student_master.parent_email', 'LIKE', '%' . $email . '%');
        }
        if ($phone != '') {
            $query->where('sc_student_master.parent_mobile', 'LIKE', '%' . $phone . '%');
        }
        if ($address != '') {
            $query->where('sc_student_master.parent_address', 'LIKE', '%' . $address . '%');
        }
        if ($created_date != '') {
            $explode = explode('-', $created_date);
            $query->whereDate('sc_student_master.created_at', '>=', date('Y-m-d', strtotime($explode[0])))->whereDate('sc_student_master.created_at', '<=', date('Y-m-d', strtotime($explode[1])));
        }
        $data['query'] = $query->orderBy('sc_student_master.id', 'desc')->select(['sc_student_master.*','sc_subject_master.main_title','sc_tutor_level.title as level_name'])->paginate(10);
        return view('admin.parent.student-ajax-list', $data);
    }
    public function editStudent($eid)
    {
        $auth = Auth()->user();
        $id = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
            $userName=trim($userName);
        }
        $data['tutorList'] = User::where('type',2)->whereNull('deleted_at')->orderBy('first_name','asc')->get(['id','first_name','last_name']);
        $data['teacher_subject_list'] = SubjectMaster::whereNull('deleted_at')->orderBy('main_title','ASC')->get();
        $sm= StudentMaster::where([['id','=',$eid]])->first();
        $data['studentData'] = $sm;
        $ts=TutorStudent::where([['student_id','=',$eid]])->whereNull('deleted_at')->first();
        $data['formData'] = $ts;
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('admin.parent.edit-student', $data);
    }
    public function deleteStudent($id)
    {
        $auth = Auth()->user();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $auth['id'];
        $update = StudentMaster::where([['id','=',$id]])->update($data);
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

    // tutor reviews
    public function addTutorReview()
    {
        $auth = Auth()->user();
        $userId = $auth['id'];
        $data['tutorList'] = User::where('type',2)->whereNull('deleted_at')->orderBy('first_name','asc')->get(['id','first_name','last_name']);
        $data['parentList'] = User::where('type',3)->whereNull('deleted_at')->orderBy('first_name','asc')->get(['id','first_name','last_name']);
        $data['teacher_subject_list'] = SubjectMaster::whereNull('deleted_at')->orderBy('main_title','ASC')->get();
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('admin.parent.add-tutor-reviews', $data);
    }
    public function saveTutorReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tutor' => 'required',
            'subject_name' => 'required',
            'parent_first_name' => 'required',
            'country' => 'required',
            'parent_mobile' => 'required|max:12',
            'parent_email' => 'required',
            'star' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error_msg' => $validator->errors()->all(),
                'data' => array()
            ], 400);
        } else {
            $auth = Auth()->user();
            $userid = $auth['id'];
            $userName = $auth['first_name'];
            if(!empty($auth['last_name']))
            {
                $userName .= ' '.$auth['last_name'];
                $userName=trim($userName);
            }
            $getCC=Country::where('id',$request->country)->first();
            $cc='';
            if($getCC && isset($getCC->phonecode))
            {
                $cc=$getCC->phonecode;
            }            
            if(isset($request->eid) && !empty($request->eid))
            {
                $add=TutorReview::whereNull('deleted_at')->where([['id', $request->eid]])->first();
                if($add)
                {
                    $pid=0;
                    $checkEmail=User::whereNull('deleted_at')->where('email', $request->parent_email)->first();
                    if($checkEmail)
                    {
                        $pid=$checkEmail->id;
                    }
                    $checkPhone=User::whereNull('deleted_at')->where('mobile_id', $request->parent_mobile)->first();
                    if($checkPhone)
                    {
                        if($pid!=0 && $pid!=$checkPhone->id)
                        {
                            $pid='';
                        }
                        else
                        {
                            $pid=$checkPhone->id;
                        }
                    }
                    $add->tutor_id = $request->tutor;
                    $add->parent_id = $pid;
                    $add->parent_first_name = $request->parent_first_name;
                    $add->parent_last_name = $request->parent_last_name;
                    $add->parent_email = $request->parent_email;
                    $add->country_id = $request->country;
                    $add->country_code = $cc;
                    $add->parent_mobile = $request->parent_mobile;
                    $add->subject_id = $request->subject_name;
                    $add->star = $request->star;
                    $add->message = $request->message;
                    $add->updated_by = $userid;
                    $add->updated_at = date('Y-m-d H:i:s');
                    $saveData = $add->save();
                }
                else
                {
                    return response()->json(['error_msg' => trans('messages.error'), 'data' => 'review not found', 'status' => 2], 200);
                }
            }
            else
            {
                $parentId=0;
                $count = User::select('id')->where('email', $request->your_email)->where('type', 3)->first();
                if (!empty($count)) {
                    $parentId=$count->id;
                }
                $count2 = User::select('id')->where('mobile_id', $request->your_phone)->where('type', 3)->first();
                if (!empty($count2)) {
                    if($parentId!=0 && $parentId!=$count2->id)
                    {
                        $parentId=0;
                    }
                    else
                    {
                        $parentId=$count2->id;
                    }
                }
                $add = new TutorReview;
                $add->tutor_id = $request->tutor;
                $add->parent_id = $parentId;
                $add->parent_first_name = $request->parent_first_name;
                $add->parent_last_name = $request->parent_last_name;
                $add->parent_email = $request->parent_email;
                $add->country_id = $request->country;
                $add->country_code = $cc;
                $add->parent_mobile = $request->parent_mobile;
                $add->subject_id = $request->subject_name;
                $add->star = $request->star;
                $add->message = $request->message;
                $add->created_by = $userid;
                $add->created_at = date('Y-m-d H:i:s');
                $saveData = $add->save();
            }
            if ($saveData) {
                if(isset($request->eid) && !empty($request->eid))
                {
                    return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'status' => 1]);
                }
                else
                {
                    return response()->json(['error_msg' => trans('messages.addedSuccessfully'), 'status' => 1]);
                }
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'status' => 0]);
            }
        }
    }    
    public function TutorReview()
    {
        $auth = Auth()->user();
        $id = $auth['id'];
        return view('admin.parent.tutor-reviews');
    }
    public function tutorReviewAjaxList(Request $request)
    {
        $auth = Auth()->user();
        $id = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
            $userName=trim($userName);
        }
        $data['page'] = $request->page;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $created_date = $request->created_date;
        $query = TutorReview::leftjoin('users', 'users.id','=','sc_tutor_reviews.tutor_id');
        if ($name != '') {
            $query->where('sc_tutor_reviews.parent_first_name', 'LIKE', '%' . $name . '%');
        }
        if ($email != '') {
            $query->where('sc_tutor_reviews.parent_email', 'LIKE', '%' . $email . '%');
        }
        if ($phone != '') {
            $query->where('sc_tutor_reviews.parent_mobile', 'LIKE', '%' . $phone . '%');
        }
        if ($created_date != '') {
            $explode = explode('-', $created_date);
            $query->whereDate('sc_tutor_reviews.created_at', '>=', date('Y-m-d', strtotime($explode[0])))->whereDate('sc_tutor_reviews.created_at', '<=', date('Y-m-d', strtotime($explode[1])));
        }
        $data['query'] = $query->orderBy('sc_tutor_reviews.id', 'desc')->select(['sc_tutor_reviews.*','users.first_name','users.last_name'])->paginate(10);
        return view('admin.parent.tutor-reviews-ajax', $data);
    }
    public function editTutorReview($eid)
    {
        $auth = Auth()->user();
        $id = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
            $userName=trim($userName);
        }
        $tr= TutorReview::where([['id','=',$eid]])->first();
        $data['formData'] = $tr;
        $data['tutorList'] = User::where('type',2)->whereNull('deleted_at')->orderBy('first_name','asc')->get(['id','first_name','last_name']);
        $data['parentList'] = User::where('type',3)->whereNull('deleted_at')->orderBy('first_name','asc')->get(['id','first_name','last_name']);
        $data['teacher_subject_list'] = SubjectMaster::whereNull('deleted_at')->orderBy('main_title','ASC')->get();
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('admin.parent.edit-tutor-reviews', $data);
    }
    public function deleteTutorReview($id)
    {
        $auth = Auth()->user();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $auth['id'];
        $update = TutorReview::where([['id','=',$id]])->update($data);
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
    public function activeTutorReview($id)
    {
        $auth = Auth()->user();
        $data['status'] = 'active';
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $auth['id'];
        $update = TutorReview::where([['id','=',$id]])->update($data);
        if ($update) {
            return response()->json([
                'message' => trans('messages.activateSuccessfully')
            ]);
            }
            else {
            return response()->json([
                'message' =>  trans('messages.error')
            ]);
        }
    }
    public function pendingTutorReview($id)
    {
        $auth = Auth()->user();
        $data['status'] = 'pending';
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $auth['id'];
        $update = TutorReview::where([['id','=',$id]])->update($data);
        if ($update) {
            return response()->json([
                'message' => trans('messages.deactivateSuccessfully')
            ]);
            }
            else {
            return response()->json([
                'message' =>  trans('messages.error')
            ]);
        }
    }
}

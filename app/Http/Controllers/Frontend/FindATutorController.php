<?php
namespace App\Http\Controllers\Frontend;

use App\Helpers\FeedbackHelper;
use App\Helpers\MailHelper;
use App\Models\ParentDetail;
use App\Helpers\ParentDetailHelper;
use App\Helpers\ReviewMasterHelper;
use App\Helpers\SubjectHelper;
use App\Helpers\TutorAvailabilityHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\TutorLevelDetailHelper;
use App\Helpers\UserHelper;
use App\Helpers\TutorSearchInquiryHelper;
use App\Helpers\TutorDetailHelper;
use App\Helpers\TutorLevelHelper;
use App\Helpers\TutorUniversityDetailHelper;
use App\Models\TutorReview;
use App\Models\User;
use App\Models\TutorForm;
use App\Models\Country;
use App\Models\PayClaimForm;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class FindATutorController extends Controller

{

    public function index(Request $request)

    {
        
		$data['title'] = 'Tutor List';
        $data['allSubjectsData'] = SubjectHelper::getAllSubjectList();
        $data['allLevelData'] = TutorLevelHelper::getAllTutorList();
        $data['subId']='';
        $data['levelName']='';
        if(isset($request->id) && !empty($request->id))
        {
            $data['subId']=base64_decode(strtr($request->id, '-_', '+/'));
        }
        if(isset($request->levelName) && !empty($request->levelName))
        {
            $data['levelName']=base64_decode(strtr($request->levelName, '-_', '+/'));
        }
       	return view('frontend.SearchTutor.index', $data);
    }

    public function getTutors(Request $request)
    {
        $final_array = array();
        if($request->page == 1){
            TutorSearchInquiryHelper::save(array('subject' => $request->input('sibject'), 'subject' => $request->input('subject'), 'level' => $request->input('level'), 'pincode' => $request->input('pincode')));
        }
        $subjectUserList = TutorLevelDetailHelper::getSearchUserId($request->subject, $request->level, $request->pincode);
        foreach ($subjectUserList as $val) {

            if (in_array($val->tutor_id, $final_array)) {
            } else {

                $final_array[] = $val->tutor_id;
            }
        }

        $query = UserHelper::getTutorListLimitFive($final_array);
        $cnt = UserHelper::getTutorList($final_array);

        foreach ($query as $val) {
            $val->url = URL::to('/') . '/tutors-details/' . sha1($val->id);
            // $val->total_hrs=0;
            $gethrs=PayClaimForm::whereNull('deleted_at')->where([['teacher_id','=',$val->id]])->sum('total_hrs');
            $star=TutorReview::whereNull('deleted_at')->where([['tutor_id','=',$val->id]])->sum('star');
            $totalReview=TutorReview::whereNull('deleted_at')->where([['tutor_id','=',$val->id]])->count();
            $val->total_hrs=$gethrs;
            $val->star=$star;
            $val->totalReview=$totalReview;
            $tid=sha1($val->id);
            $val->tutorUniversityDetails = TutorUniversityDetailHelper::getTutorUniversityDetails($tid);
        }
        if ($request->ajax()) {
            return response()->json(['count' => $cnt, 'data' => $query], 200);
        }
    }

    public function filterTutors(Request $request)
    {
        $subject =  $request->input('subject');
        $level =  $request->input('level');
        $cnt =  User::with(['subjectDetails', 'levelDetails'])->select('*')
        ->whereHas('levelDetails', function ($subjectQuery) use ($subject) {
            if(!empty($subject)){
                $subjectQuery->whereIn('subject_id', $subject);
                $subjectQuery->whereNull('deleted_at');
            }
        })
        ->whereHas('levelDetails', function ($queryVal) use ($level) {
            if(!empty($level)){
                $queryVal->whereIn('level_id', $level);
                $queryVal->whereNull('deleted_at');
            }
        })
        ->where('type',2)
        ->where('status','Accepted')
        ->whereNull('deleted_at')->count();
        $query =  User::with(['subjectDetails', 'levelDetails'])->select('*')
        ->whereHas('levelDetails', function ($subjectQuery) use ($subject) {
            if(!empty($subject)){
                $subjectQuery->whereIn('subject_id', $subject);
                $subjectQuery->whereNull('deleted_at');
            }
        })
        ->whereHas('levelDetails', function ($queryVal) use ($level) {
            if(!empty($level)){
                $queryVal->whereIn('level_id', $level);
                $queryVal->whereNull('deleted_at');
            }
        })
        ->where('type',2)
        ->where('status','Accepted')
        ->whereNull('deleted_at')
        ->paginate(4);

        foreach ($query as $val) {
            $val->url = URL::to('/') . '/tutors-details/' . sha1($val->id);
            // $val->total_hrs=0;
            $gethrs=PayClaimForm::whereNull('deleted_at')->where([['teacher_id','=',$val->id]])->sum('total_hrs');
            $star=TutorReview::whereNull('deleted_at')->where([['tutor_id','=',$val->id]])->sum('star');
            $totalReview=TutorReview::whereNull('deleted_at')->where([['tutor_id','=',$val->id]])->count();
            $val->total_hrs=$gethrs;
            $val->star=$star;
            $val->totalReview=$totalReview;
            $tid=sha1($val->id);
            $val->tutorUniversityDetails = TutorUniversityDetailHelper::getTutorUniversityDetails($tid);
        }
        return response()->json(['count' => $cnt, 'data' => $query], 200);
    }


    public function tutorDetails($id)
    {
        $userD = UserHelper::getTutorDetails($id);
        $data['data'] = $userD;
        $uid=$userD->id;
        $tutorSubjectLevelDetails = TutorLevelDetailHelper::getTutorLevelDetails($id);

        foreach ($tutorSubjectLevelDetails as $val) {
            $query = TutorLevelDetailHelper::getAllLevelDetials($val->subject_id, $id);
            $val->level_details = $query;
        }

        $data['tutorSubjectLevelDetails'] = $tutorSubjectLevelDetails;
        $data['tutorDetails'] = TutorDetailHelper::getTutorDetails($id);

        $data['tutorUniversityDetails'] = TutorUniversityDetailHelper::getTutorUniversityDetails($id);

        $data['subject_list'] = SubjectHelper::getAllSubjectList();
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        $data['tutor_comments'] = TutorReview::leftjoin('sc_subject_master','sc_subject_master.id','=','sc_tutor_reviews.subject_id')->where([['sc_tutor_reviews.tutor_id','=',$uid],['sc_tutor_reviews.status','=','active']])->get(['sc_tutor_reviews.*','sc_subject_master.main_title as subject_name']);
        $data['feedbackId'] = $id;
        $data['country_list'] = Country::orderBy('iso','ASC')->get();

        $data['gethrs']=PayClaimForm::whereNull('deleted_at')->where([['teacher_id','=',$uid]])->sum('total_hrs');
        $data['star']=TutorReview::whereNull('deleted_at')->where([['tutor_id','=',$uid]])->sum('star');
        $data['totalReview']=TutorReview::whereNull('deleted_at')->where([['tutor_id','=',$uid]])->count();
        return view('frontend.SearchTutor.view_tutor_detail', $data);
    }

    public function tutorFeedback($id)
    {
        $data['data'] = UserHelper::getTutorDetails($id);
        $tutorSubjectLevelDetails = TutorLevelDetailHelper::getTutorLevelDetails($id);
        foreach ($tutorSubjectLevelDetails as $val) {
            $query = TutorLevelDetailHelper::getAllLevelDetials($val->subject_id, $id);
            $val->level_details = $query;
        }
        $data['tutorSubjectLevelDetails'] = $tutorSubjectLevelDetails;
        $data['tutorDetails'] = TutorDetailHelper::getTutorDetails($id);
        $data['tutorUniversityDetails'] = TutorUniversityDetailHelper::getTutorUniversityDetails($id);
        $data['subject_list'] = SubjectHelper::getAllSubjectList();
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        $data['tutor_comments'] = FeedbackHelper::getAllFeedbackByTutorId($id);
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('frontend.SearchTutor.add_tutor_feedback', $data);
    }
    public function saveReview(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'description' => 'required',

            'subject' => 'required|max:30',

            'outcome' => 'required|max:30',

            'rating' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
        } else {
            $data = array(
                'tutor_id' => $request->id,
                'descriptions' => $request->description,
                'subject' => $request->subject,
                'outcome' => $request->outcome,
                'rating' => $request->rating,
            );
            ReviewMasterHelper::save($data);

            return response()->json(['error_msg' => "Successfully instered", 'data' => $data], 200);
        }
    }

    public function checkEmailParent(Request $request)
    {

        $checkParentEmail = UserHelper::checkEmail($request->email);
        if ($checkParentEmail) {
            return 1;
        } else {
            return 0;
        }
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
    public function saveInquiry(Request $request)
    {
        $count = UserHelper::checkEmail($request->email);
        if (empty($count)) {
            $rules = array(
                'first_name' => 'required| max:30',

                'last_name' => 'required| max:30',

                'email' => 'required| max:30',

                'country' => 'required',
                'phone' => 'required|max:12',

                'address' => 'required| max:255',

                'username' => 'required| max:30',

                'password' => ['required', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%&*]).*$/'],

            );
        } else {
            $rules = array(
                'first_name' => 'required| max:30',

                'last_name' => 'required| max:30',

                'email' => 'required| max:30',

                'country' => 'required',
                'phone' => 'required|max:12',

                'address' => 'required| max:255',

                'username' => 'required| max:30',

            );
        }

        $messsages = array(
            'password.regex' => 'Password should be include 6 charaters, alphabets, numbers and special characters',

        );
        $validator = Validator::make($request->all(), $rules, $messsages);



        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
        } else {
            $bookDate = array();
            $mainId = $request->input('main_id');
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
            foreach ($mainId as $val) {
                $daysArray[] = $request->input('days' . $val)[0];
            }
            foreach($daysArray as $days){
                $bookDate[] = date('Y-m-d', strtotime($days));
            }
            $count = UserHelper::checkEmail($request->email);
            $getCC=Country::where('id',$request->country)->first();
            $cc='';
            if($getCC && isset($getCC->phonecode))
            {
                $cc=$getCC->phonecode;
            }
            if (empty($count)) {
                $userArr = array(
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'type' => 3,
                    'email' => $request->email,
                    'country_id' => $request->country,
                    'country_code' => $cc,
                    'mobile_id' => $request->phone,
                    'address1' => $request->address,
                    'user_name' => $request->username,
                    'status' => 'Pending',
                    'password' => Hash::make($request->password),
                );

                $userData = UserHelper::save($userArr);
                $subjectArr = [];
                $subjectNameArr = [];
                $getSubjectName = [];
                $levelArr = [];
                $levelNameArr = [];
                $getLevelName = [];
                $dayArr = [];
                $timeArr = [];
                if ($userData) {
                    if (!empty($mainId)) {
                        $i = 0;
                        foreach ($mainId as $vals) {
                            $inquiryArr = array(
                                'user_id' => $userData,
                                'subject_id' => $request->input('subjectinquiry' . $vals)[0],
                                'level_id' => $request->input('level' . $vals)[0],
                                'tuition_day' => $request->input('days' . $vals)[0],
                                'tuition_time' => $request->input('tuition_time' . $vals)[0],
                                'booking_date' => $bookDate[$i],
                                'tutor_id' => $request->tutorid,
                            );
                            $subjectArr[] = $request->input('subjectinquiry' . $vals)[0];
                            $levelArr[] = $request->input('level' . $vals)[0];
                            $dayArr[] = $request->input('days' . $vals)[0];
                            $timeArr[] = $request->input('tuition_time' . $vals)[0];
                            $i++;
                            $inquiry = ParentDetailHelper::save($inquiryArr);
                        }
                        foreach($subjectArr as $val){
                            $subjectName = ParentDetailHelper::fetchSubjectName($val);
                            $subjectNameArr[] = $subjectName;
                        }
                        foreach($levelArr as $val){
                            $levelName = ParentDetailHelper::fetchLevelName($val);
                            $levelNameArr[] = $levelName;
                        }
                    }
                    foreach($subjectNameArr as $val){
                        $getSubjectName[] = $val[0]->subjectDetails->main_title;
                    }
                    foreach($levelNameArr as $val){
                        $getLevelName[] = $val[0]->levelDetails->title;
                    }
                    $subjectName = implode(", ", $getSubjectName);
                    $levelName = implode(", ", $getLevelName);
                    $day = implode(", ", $dayArr);
                    $time = implode(", ", $timeArr);
                    $lastId = $userData;
                    $getTutorDetails = UserHelper::getUserDetails($request->tutorid);
                    $nameSubject = $getTutorDetails->first_name.' - '.$getTutorDetails->subject_name;
                    $tutorLink = '<a href="https://www.scienceclinic.co.uk/tutors-details/'.sha1($request->tutorid).'">https://www.scienceclinic.co.uk/tutors-details/'.sha1($request->tutorid).'</a>';
                    if ($inquiry) {
                        $adminData = UserHelper::getAdminData();
                        if($adminData){
                            $email = $adminData->email;
                            $html = '<p>New Tutoring Inquiry</p><br>
                                <p style="margin-bottom: 0px;">' . $nameSubject . '</p>
                                <p style="margin-bottom: 0px;">' . $tutorLink . '</p>
                                <p style="margin-bottom: 0px;">Subjects : <span>' . $subjectName . '</span></p>
                                <p style="margin-bottom: 0px;">Level : <span>' . $levelName . '</span></p>
                                <p style="margin-bottom: 0px;">Name : <span>' . $request->first_name . ' ' . $request->last_name . '</span></p>
                                <p style="margin-bottom: 0px;">Day : <span>' . $day . '</span></p>
                                <p style="margin-bottom: 0px;">Time : <span>' . $time . '</span></p>
                                <p style="margin-bottom: 0px;">Email : <span>' . $request->email . '</span></p>
                                <p style="margin-bottom: 0px;">Phone No : <span>' . $request->phone . '</span></p>
                                <p style="margin-bottom: 0px;">Address : <span>' . $request->address . '</span></p>
                            ';
                            $subject = __('emails.parent_inquiry');
                            $body = __('emails.parent_inquiry_body', ['USERNAME' => 'Admin', 'HTMLTABLE' => $html]);
                            $body_email = __('emails.template', ['BODYCONTENT' => $body]);
                            $mail = MailHelper::mail_send($body_email, $email, $subject);
                        }
                    }
                    return response()->json(['error_msg' => "Successfully instered", 'data' => $userArr], 200);
                } else {
                    return response()->json(['error_msg' => "Something went wrong", 'data' => ''], 500);
                }
            } else {
                $getDetails = ParentDetailHelper::getDetailsExists($count->id, $request->subjectinquiry, $request->level, $request->tutorid, $request->tuition_time, $bookDate);
                if ($getDetails) {
                    return response()->json(['error_msg' => "Inquiry Already Exists", 'data' => '', 'status' => 0], 200);
                } else {
                    if (!empty($mainId)) {
                        $i = 0;
                        foreach ($mainId as $vals) {
                            $inquiryArr = array(
                                'user_id' => $count->id,
                                'subject_id' => $request->input('subjectinquiry' . $vals)[0],
                                'level_id' => $request->input('level' . $vals)[0],
                                'tuition_day' => $request->input('days' . $vals)[0],
                                'tuition_time' => $request->input('tuition_time' . $vals)[0],
                                'booking_date' => $bookDate[$i],
                                'tutor_id' => $request->tutorid,
                            );
                            $i++;
                            ParentDetailHelper::save($inquiryArr);
                        }
                    }
                    return response()->json(['error_msg' => "Successfully instered", 'data' => $inquiryArr, 'status' => 1], 200);
                }
            }
        }
    }
    public function saveFeedback(Request $request)
    {
        $rules = array(
            'your_first_name' => 'required| max:30',
            'your_last_name' => 'required| max:30',
            'your_email' => 'required| max:30',
            'country' => 'required',
            'your_phone' => 'required|max:12',
            'subject' => 'required',
            'star' => 'required',
            'message' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
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
            $getCC=Country::where('id',$request->country)->first();
            $cc='';
            if($getCC && isset($getCC->phonecode))
            {
                $cc=$getCC->phonecode;
            }
            $add = new TutorReview;
            $add->tutor_id = $request->tutorid;
            $add->parent_id = $parentId;
            $add->parent_first_name = $request->your_first_name;
            $add->parent_last_name = $request->your_last_name;
            $add->parent_email = $request->your_email;
            $add->country_id = $request->country;
            $add->country_code = $cc;
            $add->parent_mobile = $request->your_phone;
            $add->subject_id = $request->subject;
            $add->star = $request->star;
            $add->message = $request->message;
            $feedData = $add->save();
            if ($feedData) {
                return response()->json(['error_msg' => "Successfully instered", 'data' => $add], 200);
            } else {
                return response()->json(['error_msg' => "Something went wrong", 'data' => ''], 500);
            }
        }
    }
    public function tutorAvailabilityDetails(Request $request)
    {
        $getU=User::where('id',$request->tutotid)->first();
        $userName='';
        if(!empty($getU->first_name)){ $userName=$getU->first_name; }
        if(!empty($getU->last_name)){ $userName.=' '.$getU->last_name; }
        $booking = TutorForm::where([['tutor_name','=',$userName]])->get();
        $available = TutorAvailabilityHelper::getData($request->tutotid);
        $offline =  ParentDetail::with(['tutorDetails', 'subjectDetails', 'levelDetails'])->select('id', 'tuition_day', 'tutor_id', 'subject_id', 'attend_class', 'tutor_reject_reason', 'teaching_start_time', 'booking_date', 'user_name as userName', 'level_id', 'email as userEmail', 'created_by as createdBy','main_id')
            ->whereHas('subjectDetails', function ($subjectQuery) {
                $subjectQuery->whereNull('deleted_at');
            })
            ->whereHas('tutorDetails', function ($queryVal) {
                $queryVal->where('status', 'Accepted');
            })->where('inquiry_type', '2')->where('tutor_id', $request->tutotid)->whereNotNull('user_name')->whereNull('deleted_at')->get();
        $data=array('bookingList'=>$booking, 'availableList'=>$available, 'offlineList'=>$offline);
        return response()->json($data);
    }

}

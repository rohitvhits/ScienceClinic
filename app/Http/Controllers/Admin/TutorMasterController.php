<?php
namespace App\Http\Controllers\Admin;
use App\Http\Traits\ImageUploadTrait;
use App\Helpers\ApiAccessTokenHelper;
use App\Helpers\MailHelper;
use App\Helpers\MerithubHelper as Helper;
use App\Helpers\ParentDetailHelper;
use App\Helpers\SubjectHelper;
use App\Helpers\TutorDetailHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\StudentMaster;
use App\Models\TutorForm;
use App\Models\TutorStudent;
use Illuminate\Support\Facades\Validator;
use App\Helpers\UserHelper;
use App\Helpers\TutorMasterHelper;
use App\Helpers\TutorUniversityDetailHelper;
use App\Helpers\TutorSubjectDetailHelper;
use App\Helpers\TutorLevelHelper;
use App\Helpers\TutorLevelDetailHelper;
use App\Models\ApiAccessToken;
use App\Models\CenterTimeTable;
use App\Models\Country;
use App\Models\SubjectMaster;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use function GuzzleHttp\Promise\all;
use File;


class TutorMasterController extends Controller

{

    public $successStatus = 200;

    public $validationStatus = 400;

    public $errorStatus = 500;

    public $unauthorizedStatus = 401;

    public $notFoundStatus = 404;

    public $alreadyExistStatus = 409;

    use ImageUploadTrait;

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function centerTimetable()
    {
        $data['teacher_list'] = User::where('status', 'Accepted')->where('type', 2)->where('center_tutor', 'yes')->whereNull('deleted_at')->orderBy('id', 'desc')->get();
        $data['subject_list'] = SubjectHelper::getAllSubjectList();
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        $data['student_list'] = StudentMaster::whereNull('deleted_at')->orderBy('student_name', 'asc')->get(['id','student_name']);
        return view('admin.centerTimetable.index', $data);
    }
    public function addCenterTimetable(Request $request)
    {
        $dateTime = array();
        $teacher_id = $request->teacher_name;
        $date = $request->date;
        $data = explode("T", $request->date);
        $data1 = explode("+", $data[1]);
        $dateTime[] = $data1[0];
        $finalDateTime = implode(" ", $dateTime);
        $day_of_tution=Carbon::parse($data[0])->format('l');
        $tution_time=$finalDateTime;
        $userId = Auth()->user();
        $insert = new CenterTimeTable();
        $insert->tutor_id=$teacher_id;
        $insert->subject_id=$request->subject_name;
        $insert->level=$request->level;
        $insert->month=$request->month;
        $insert->student=$request->student;
        $insert->available_datetime=$data[0].' '.$finalDateTime;
        $insert->day_of_tution=$day_of_tution;
        $insert->tution_time=$tution_time;
        $insert->created_at=date('Y-m-d H:i:s');
        if ($userId) {
            $insert->created_by=$userId['id'];
        }
        $insert->save();
        $insertId = $insert->id;
        if ($insertId) {
            $getTnam=User::find($teacher_id);
            $teacher_name=$getTnam->first_name;
            $student_id=$request->student;
            $student_name=StudentMaster::find($student_id);
            $student_name=$student_name->student_name;
            
            $adc=new TutorForm;
            $adc->tutor_name=$teacher_name;
            $adc->tutor_id=$teacher_id;
            $adc->student_id=$student_id;
            $adc->student_name=$student_name;
            $adc->day_of_tution=$day_of_tution;
            $adc->tution_time=$tution_time;
            $adc->month=$request->month;
            $adc->center_id=$insertId;
            if ($userId) {
                $adc->created_by=$userId['id'];
            }
            $adc->created_at=date('Y-m-d H:i:s');
            $adc->save();

            $ats=new TutorStudent();
            $ats->tutor_id=$teacher_id;
            $ats->student_id=$student_id;
            $ats->created_by=$userId['id'];
            $ats->created_at=date('Y-m-d H:i:s');
            $ats->save();
            return response()->json(['error_msg' => "Successfully Updated", 'data' => $insertId], 200);
        } else {
            return response()->json(['error_msg' => "Something Went Wrong", 'data' => ''], 400);
        }
    }

    public function getCenterTimetable(Request $request)
    {
        $query = CenterTimeTable::leftjoin('users', 'users.id','=','sc_center_timetable.tutor_id')->leftjoin('sc_subject_master', 'sc_subject_master.id','=','sc_center_timetable.subject_id')->leftjoin('sc_student_master', 'sc_student_master.id','=','sc_center_timetable.student')->whereNull('sc_center_timetable.deleted_at')->get(['sc_center_timetable.*','users.first_name as teacher_name','sc_subject_master.main_title as subjectName','sc_student_master.student_name']);
        return response()->json($query);
    }
    public function getBookedTimetable(Request $request)
    {
        $id = $request->id;
        $data = CenterTimeTable::select(['id','tutor_id','available_datetime'])->whereNull('deleted_at')->where('id',$id)->first();
        if($data){
            $getDateTime = explode(' ',$data->available_datetime);
            $date = $getDateTime[0];
            $startTime = $getDateTime[1];
            $endTime = Carbon::parse($startTime)->addHour();
            $tutorId = $data->tutor_id;
            $checkBooking = CenterTimeTable::whereNull('deleted_at')->where('available_datetime', $date)->whereTime('available_datetime','>=', $startTime)->whereTime('available_datetime','<=', $endTime)->first();
            if($checkBooking){
                return 1;
            }
            else{
                return 0;
            }
        }
    }

    public function deleteCenterTimetable(Request $request)
    {
        $id = $request->id;
        $userId = Auth()->user();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $userId['id'];
        $update = CenterTimeTable::where('id',$id)->update($data);
        if ($update)
        {
            $data2['deleted_at'] = date('Y-m-d H:i:s');
            $data2['deleted_by'] = $userId['id'];
            $update2 = TutorForm::where('center_id',$id)->update($data2);
            return response()->json(['success_message' => trans('messages.deletedSuccessfully'), 'status' => 1 ]);
        }
        else {
            return response()->json(['error_message' =>  trans('messages.error'), 'status' => 0 ]);
        }
    }

    public function tutorAdd()
    {
        $data['subject_list'] = SubjectHelper::getAllSubjectList();
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('admin.tutor.add-tutor', $data);
    }

    public function saveTutor(Request $request)
    {
        $rules = array(
            'name' => 'required | max:30',
            'email' => 'required | email',
            'country' => 'required',
            'mobile' => 'required | numeric',
            'address1' => 'required | max:255',
            'city' => 'required | max:20',
            'postcode' => 'required | max:8',
            'bio' => 'required',
            'title' => 'required | max:100',
            'profile_image' => 'required',
            'dbsdisclosure' => 'required',
            'exprienceinuk' => 'required',
            'tutorexperienceinuk' => 'required',
            'paytax' => 'required',
            'user_name' => 'required | max:255',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%&*]).{6,}$/',
            'university' => 'required | max:35',
            'qualification' => 'required | max:35',
            'center_tutor' => 'required',
            'subject_name' => 'required | max:255'
        );
        $messsages = array(
            'password.regex' => 'Password should include 6 charaters, alphabets, numbers and special characters'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
        } else {
            $image = '';
            if(!empty($request->crop_image) || $request->crop_image != ''){
                $data = explode(';', $request->crop_image);
                $part = explode("/", $data[0]);
                $image = $request->crop_image;  // your base64 encoded
                $image = str_replace('data:image/'.$part[1].';base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $fileName = time().uniqid() .'.'.$part[1];
                $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/uploads/user/';
                \File::put($_SERVER['DOCUMENT_ROOT'].'/uploads/user/' .$fileName, base64_decode($image));
                chmod($destinationPath.$fileName,0777);
                $image = url('/').'/uploads/user/'.$fileName;
            }
            // if ($request->file('profile_image') != '')
            // {
            //     $image = $this->uploadImageWithCompress($request->file('profile_image'), 'uploads/user');
            // }
            $getCC=Country::where('id',$request->country)->first();
            $cc='';
            if($getCC && isset($getCC->phonecode))
            {
                $cc=$getCC->phonecode;
            }
            $data_array = array(
                'first_name' => $request->name,
                'email' => $request->email,
                'country_id' => $request->country,
                'country_code' => $cc,
                'mobile_id' => $request->mobile,
                'address1' => $request->address1,
                'city' => $request->city,
                'postcode' => $request->postcode,
                'bio' => $request->bio,
                'title' => $request->title,
                'subject_name' => $request->subject_name,
                'profile_photo' => $image,
                'type' => 2,
                'user_name' => $request->user_name,
                'status' => 'Accepted',
                'center_tutor' => $request->center_tutor,
                'password' => Hash::make($request->password)
            );
            $data = UserHelper::save($data_array);
            if ($data) {
                $document = '';
                if ($request->dbsdisclosure == 'Yes') {
                    if ($request->file('document_pdf') != '') {
                        $document = $this->uploadImageWithCompress($request->file('document_pdf'), 'uploads/user');
                    }
                }
                $tutorDetails = array(
                    'tutor_id' => $data,
                    'dbs_disclosure' => $request->dbsdisclosure,
                    'experience_in_uk' => $request->exprienceinuk,
                    'total_experience_in_uk' => $request->tutorexperienceinuk,
                    'pay_tex' => $request->paytax,
                    'document' => $document
                );
                $detail = TutorDetailHelper::save($tutorDetails);
                $university = $request->input('university');
                if (!empty($university)) {
                    foreach ($university as $key => $val) {
                        $document_image = '';
                        if ($request->file('document_certi') != '') {
                            $document_image = $this->uploadImageWithCompress($request->file('document_certi')[$key], 'uploads/user/certificate');
                        }
                        $tutorUniversityDetails = array(
                            'tutor_id' => $data,
                            'university_name' => $val,
                            'qualification' => $request->input('qualification')[$key],
                            'document_image' => $document_image
                        );
                        $university = TutorUniversityDetailHelper::save($tutorUniversityDetails);
                    }
                }
                $subject = $request->input('main_subject_id');
                if (!empty($subject)) {
                    foreach ($subject as $vals) {
                        $levelArray = $request->input('level' . $vals);
                        foreach ($levelArray as $val) {
                            $subject = $request->input('subject' . $vals);
                            $tutorLevelDetails = array(
                                'tutor_id' => $data,
                                'level_id' => $val,
                                'subject_id' => $request->input('subject' . $vals)[0],
                                'website_flag' => 1
                            );
                            $subject = TutorLevelDetailHelper::save($tutorLevelDetails);
                        }
                    }
                }
                /*
                if ($data && $detail && $university && $subject) {
                    $adminData = UserHelper::getAdminData();
                    $email = $adminData->email;
                    $html = '<p>Below are the details of the new tutor</p><br>
                        <p style="margin-bottom: 0px;">Name : <span>' . $request->name . '</span></p>
                        <p style="margin-bottom: 0px;">Email : <span>' . $request->email . '</span></p>
                        <p style="margin-bottom: 0px;">Phone No : <span>' . $request->mobile . '</span></p>
                        <p style="margin-bottom: 0px;">Address1 : <span>' . $request->address1 . '</span></p>
                        <p style="margin-bottom: 0px;">City : <span>' . $request->city . '</span></p>
                        <p style="margin-bottom: 0px;">Postcode : <span>' . $request->postcode . '</span></p>
                        <p style="margin-bottom: 0px;">Bio : <span>' . $request->bio . '</span></p>
                    ';
                    $subject = __('emails.tutor_inquiry');
                    $body = __('emails.tutor_inquiry_body', ['USERNAME' => 'Admin', 'HTMLTABLE' => $html]);
                    $body_email = __('emails.template', ['BODYCONTENT' => $body]);
                    $mail = MailHelper::mail_send($body_email, $email, $subject);
                }
                */
                return response()->json(['error_msg' => trans('messages.addedSuccessfully'), 'data' => $data, 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'data' => $data, 'status' => 0], 200);
            }
        }
    }

    public function index()
    {
        $totur = User::get();
        $getSubject = SubjectHelper::getAllSubjectList();
        return view('admin.tutor.tutor', compact('getSubject'));
    }

    public function ajaxList(Request $request)
    {

        $data['page'] = $request->page;

        $first_name = $request->first_name;

        $email = $request->email;

        $mobile = $request->mobile_id;

        $status = $request->status;
        $subject = $request->subject;

        $created_date = $request->created_date;

        $data['query'] = TutorMasterHelper::getListwithPaginate($first_name, $email, $mobile, $status, $subject, $created_date);

        return view('admin.tutor.tutor_ajax', $data);
    }

    public function destroy($id)
    {
        $update = TutorMasterHelper::SoftDelete(array(), array('id' => $id));
        if ($update) {
            return response()->json([
                'message' => trans('messages.deletedSuccessfully')
            ]);
        } else {
            return response()->json([
                'message' =>  trans('messages.error')
            ]);
        }
    }
    public function deactivateUser(Request $request)
    {
        $id = $request->id;
        $update = TutorMasterHelper::deactivateUser(array(), array('id' => $id));
        if ($update) {
            return response()->json([
                'message' => trans('messages.deactivatedSuccessfully')
            ]);
        } else {
            return response()->json([
                'message' =>  trans('messages.error')
            ]);
        }
    }
    public function activateUser(Request $request){
        $id = $request->id;
        $update = TutorMasterHelper::activateUser(array(), array('id' => $id));
        if ($update) {
            return response()->json([
                'message' => trans('messages.activatedSuccessfully')
            ]);
        } else {
            return response()->json([
                'message' =>  trans('messages.error')
            ]);
        }
    }

    public function show($id)
    {

        $data['tutor'] = TutorMasterHelper::getDetailsById($id);
        $data['level'] = TutorLevelDetailHelper::getDetailsById($id);
        if (isset($data['tutor']->id)) {

            return view('admin.tutor.tutor_view', $data);
        } else {

            abort(404);
        }
    }

    public function getUniversityDetails(Request $request)
    {

        $data['page'] = $request->page;



        $tutor_id = $request->tutor_id;

        $data['query'] = TutorUniversityDetailHelper::getListwithPaginate($tutor_id);

        return view('admin.tutor.tutor_university_list', $data);
    }

    public function getSubjectDetails(Request $request)
    {

        $data['page'] = $request->page;

        $tutor_id = $request->tutor_id;

        $data['query'] = TutorSubjectDetailHelper::getListwithPaginate($tutor_id);

        return view('admin.tutor.tutor_subject_list', $data);
    }

    public function getLevelDetails(Request $request)
    {

        $data['page'] = $request->page;

        $tutor_id = $request->tutor_id;

        $data['query'] = TutorLevelDetailHelper::getListwithPaginate($tutor_id);

        return view('admin.tutor.tutor_level_list', $data);
    }

    public function getOtherDetails(Request $request)
    {
        $data['page'] = $request->page;

        $tutor_id = $request->tutor_id;
        
        $data['tutor'] = TutorMasterHelper::getDetailsById($tutor_id);
        $data['query'] = TutorDetailHelper::getOtherListwithPaginate($tutor_id);

        return view('admin.tutor.tutor_other_list', $data);
    }
    public function getStudentDetails(Request $request)
    {
        $data['page'] = $request->page;
        $tutor_id = $request->tutor_id;
        // $data['query'] = TutorDetailHelper::getStudentListwithPaginate($tutor_id);
        $data['query'] = TutorStudent::leftjoin('sc_student_master', 'sc_student_master.id','=','sc_tutor_student.student_id')->leftjoin('sc_subject_master', 'sc_subject_master.id','=','sc_student_master.subject_id')->where([['sc_tutor_student.tutor_id','=',$tutor_id]])->orderBy('sc_tutor_student.id', 'desc')->select(['sc_tutor_student.*','sc_student_master.student_name','sc_student_master.parent_name','sc_student_master.parent_mobile','sc_student_master.parent_email','sc_student_master.parent_address','sc_student_master.level','sc_student_master.year_group','sc_subject_master.main_title'])->paginate(10);
        return view('admin.tutor.tutor_student_list', $data);
    }
    function base64url_encode($str)
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }
    function generate_jwt($headers, $payload, $secret = '')
    {
        $secret = env('MERITHUB_CLIENT_SECRET');
        $headers_encoded = self::base64url_encode(json_encode($headers));
        $payload_encoded = self::base64url_encode(json_encode($payload));
        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
        $signature_encoded = self::base64url_encode($signature);
        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
        return $jwt;
    }
    public function changeStatus(Request $request)
    {
        $character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $randomString = substr(str_shuffle(str_repeat($character, 5)), 0, 4);
        $randomNumbers = substr(str_shuffle(str_repeat($numbers, 5)), 0, 4);
        $userUniqueId = $randomNumbers . '-' . $randomString;
        $query = UserHelper::updateStatus($request->id, $request->status, $userUniqueId);

        if ($query) {

            $getUserData = UserHelper::getUserDetails($request->id);
            if ($request->status == 'Accepted') {
                $html = '<p>Your account has been approved by admin now you can login.</p>';
                $subject = __('emails.tutor_account_email');
                $BODY = __('emails.tutor_account_body', ['USERNAME' => $getUserData->first_name, 'HTMLTABLE' => $html]);
                $body_email = __('emails.template', ['BODYCONTENT' => $BODY]);
                $mail = MailHelper::mail_send($body_email, $getUserData->email, $subject);
            }
            /*Merithub Code*/
            $clientId = env('MERITHUB_CLIENT_ID');
            $timeZone = env('APP_TIMEZONE');
            $headers = array('alg' => 'HS256', 'typ' => 'JWT');
            $payload = array('aud' => 'https://serviceaccount1.meritgraph.com/v1/' . $clientId . '/api/token', 'iss' => $clientId, 'expiry' => (time() + 55));
            $jwt = self::generate_jwt($headers, $payload);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://serviceaccount1.meritgraph.com/v1/' . $clientId . '/api/token',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'grant_type=urn%3Aietf%3Aparams%3Aoauth%3Agrant-type%3Ajwt-bearer&assertion=' . $jwt,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded'
                ),
            ));
            curl_setopt($curl, CURLOPT_FAILONERROR, true);
            $accessToken = curl_exec($curl);
            if (!$accessToken) {
                echo curl_error($curl);
            }
            curl_close($curl);
            if ($accessToken) {
                $getAccessToken = json_decode($accessToken);
                $token['access_token'] = $getAccessToken->access_token;
                $token['time'] = date('Y-m-d H:i:s');
                $token['api_response'] = $accessToken;
                $dataInsert = ApiAccessTokenHelper::save($token, $request->id);
                $lastId = $dataInsert;
                $getData = ApiAccessTokenHelper::getDetails($lastId);

                $curl = curl_init();
                if($getUserData->type == "2"){
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://serviceaccount1.meritgraph.com/v1/' . $clientId . '/users',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => '{
                            "name": "'.$getUserData->first_name.'",
                            "img": "'.$getUserData->profile_photo.'",
                            "lang": "en",
                            "clientUserId": "'.$getUserData->unique_user_id.'",
                            "email": "'.$getUserData->email.'",
                            "role": "C",
                            "timeZone": "'.$timeZone.'",
                            "permission": "CC"
                        }',
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: '.$getData->access_token,
                            'Content-Type: application/json'
                        ),
                    ));
                }
                else{
                    $name = $getUserData->first_name.' '.$getUserData->last_name;
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://serviceaccount1.meritgraph.com/v1/' . $clientId . '/users',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => '{
                            "name": "'.$name.'",
                            "img": "'.$getUserData->profile_photo.'",
                            "lang": "en",
                            "clientUserId": "'.$getUserData->unique_user_id.'",
                            "email": "'.$getUserData->email.'",
                            "role": "M",
                            "timeZone": "'.$timeZone.'",
                            "permission": "CJ"
                        }',
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: '.$getData->access_token,
                            'Content-Type: application/json'
                        ),
                    ));
                }
                $userAdded = curl_exec($curl);
                curl_setopt($curl, CURLOPT_FAILONERROR, true);
                if (!$userAdded) {
                    echo curl_error($curl);
                }
                curl_close($curl);
                $userToken['api_response'] = $userAdded;
                $query = UserHelper::updateApiResponse($request->id, $userToken);
            }
            return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => array('status' => $request->status)], 200);
        } else {

            return response()->json(['error_msg' => trans('messages.error'), 'data' => array()], 500);
        }
    }

    public function addHourlyRate(Request $request)
    {
        $update = TutorLevelDetailHelper::saveHourlyRate($request->tutor_id, $request->rate, $request->subject_id);

        if ($update) {
            return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => $update], 200);
        } else {

            return response()->json(['error_msg' => trans('messages.error'), 'data' => array()], 500);
        }
    }
    public function getCount(Request $request)
    {
        $data = TutorLevelDetailHelper::getDetailsHourlyRateById($request->id);

        return response()->json(['error_msg' => 'Success', 'data' => $data], 200);
    }
}

<?php

namespace App\Http\Controllers\Frontend\Tutor;

use App\Helpers\ApiAccessTokenHelper;
use App\Helpers\MailHelper;
use App\Helpers\OnlineTutoringHelper;
use App\Helpers\ParentDetailHelper;
use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\User;
use App\Notifications\AdminHourlyRateNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class ParentListController extends Controller
{
    public function index()
    {
        $tutorId = auth::user()->id;
        $data['parentslist'] = ParentDetailHelper::getParentData($tutorId);
        return view('frontend.tutor.tutor-parent-list', $data);
    }

    public function getParentDetails($id)
    {
        $data['parentData'] = UserHelper::getParentDetailsById($id);
        return view('frontend.tutor.tutor-parent-details', $data);
    }

    public function getOnlineTutoringData()
    {
        $data = OnlineTutoringHelper::getDetails();
        return json_encode($data);
    }

    public function parentSubjectDetails(Request $request)
    {
        $tutor_id = Auth::user()->id;
        $data['query'] = ParentDetailHelper::getListwithPaginateWithParent($request->parentID, $tutor_id);
        return view('frontend.tutor.parent-subject-details', $data);
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
    public function attendLesson(Request $request)
    {
        $tutor_id = Auth::user()->id;
        if ($request->teachingType == 8) {
            $getData = ParentDetailHelper::getMerithubStudentlesson($tutor_id, $request->subjectId, $request->teachingType);
            if ($getData) {
                foreach ($getData as $val) {
                    $update = ParentDetailHelper::attendMerithubStudentlesson($val->id, $val->tutor_id, $val->subject_id);
                }
                $getTutorData = UserHelper::getTutorDetailsById($tutor_id);
                $getUserId = json_decode($getTutorData->api_response);
                $userId = $getUserId->userId;
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
                    $token['updated_by'] = $tutor_id;
                    $token['updated_at'] = date('Y-m-d H:i:s');
                    $dataUpdate = ApiAccessTokenHelper::update($tutor_id, $token);
                    $getBarerToken = ApiAccessTokenHelper::getTutorAccessToken($tutor_id);
                    $barerToken = $getBarerToken->access_token;
                    $getDetails = ParentDetailHelper::getSubjectDetails($request->id, $tutor_id, $request->subjectId);
                    $startTime = \Carbon\Carbon::createFromFormat('H:i:s', $getDetails->teaching_start_time);
                    $endTime = \Carbon\Carbon::createFromFormat('H:i:s', $getDetails->teaching_end_time);
                    $totalDuration = $endTime->diffInMinutes($startTime);
                    $bookingDate = date('Y-m-d', strtotime($getDetails->booking_date));
                    $teachingStartTime = date('H:i:s', strtotime($getDetails->teaching_start_time));
                    $startTimeVal = $bookingDate . 'T' . $teachingStartTime . '+01:00';
                    if ($dataUpdate) {
                        $curlClass = curl_init();
                        curl_setopt_array($curlClass, array(
                            CURLOPT_URL => 'https://class1.meritgraph.com/v1/' . $clientId . '/' . $userId,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => '{
                                "title" : "' . $getDetails->subjectDetails->main_title . '",
                                "startTime" : "' . $startTimeVal . '",
                                "recordingDownload": false,
                                "duration" : ' . $totalDuration . ',
                                "lang" : "en",
                                "timeZoneId" : "' . $timeZone . '",
                                "type" : "oneTime",
                                "access" : "private",
                                "autoRecord" : false,
                                "login" : false,
                                "layout" : "CR",
                                "status" : "up",
                                "recording" : {
                                    "record" : true,
                                    "autoRecord": false, 
                                    "recordingControl": true 
                                },
                                "participantControl" : {
                                    "write" : false,
                                    "audio" : true,
                                    "video" : true
                                }
                            }',
                            CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json',
                                'Authorization: ' . $barerToken
                            ),
                        ));
                        curl_setopt($curlClass, CURLOPT_FAILONERROR, true);
                        $scheduledClass = curl_exec($curlClass);
                        if (!$scheduledClass) {
                            echo curl_error($curlClass);
                        }
                        curl_close($curlClass);
                        if ($scheduledClass) {
                            $getHostLink = json_decode($scheduledClass);
                            $link = 'https://merithub.com/' . $clientId . '/sessions/view/' . $getHostLink->classId . '/' . $getHostLink->commonLinks->commonParticipantLink;
                            $linkTutor = 'https://merithub.com/' . $clientId . '/sessions/view/' . $getHostLink->classId . '/' . $getHostLink->commonLinks->commonHostLink;
                            $hostLink = $linkTutor;
                            $getScheduledData = ParentDetailHelper::getScheduledMerithubStudentlesson($tutor_id, $request->subjectId, $request->teachingType);
                            foreach ($getScheduledData as $value) {
                                $apiResponse['api_response'] = $scheduledClass;
                                $apiResponse['updated_at'] = date('Y-m-d H:i:s');
                                $apiResponse['updated_by'] = $tutor_id;
                                $update = ParentDetailHelper::updateResponse($value->subject_id, $value->tutor_id, $apiResponse);
                                $getUserDetails = UserHelper::getDetailsById($value->user_id);
                                if ($getUserDetails->type == '3') {
                                    $userApiData = json_decode($getUserDetails->api_response);
                                    $curl = curl_init();
                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://class1.meritgraph.com/v1/' . $clientId . '/' . $getHostLink->classId . '/users',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                        CURLOPT_POSTFIELDS => '{
                                            "users": [
                                                {
                                                    "userId": "' . $userApiData->userId . '",
                                                    "userLink" : "' . $getHostLink->commonLinks->commonParticipantLink . '",
                                                    "userType": "su"
                                                }

                                            ]
                                        }
                                        ',
                                        CURLOPT_HTTPHEADER => array(
                                            'Content-Type: application/json',
                                            'Authorization: ' . $barerToken
                                        ),
                                    ));
                                    curl_setopt($curl, CURLOPT_FAILONERROR, true);
                                    $scheduleLink = curl_exec($curl);
                                    if (!$scheduleLink) {
                                        echo curl_error($curl);
                                    }
                                    curl_close($curl);
                                    if ($scheduleLink) {
                                        $getParticipantLink = json_decode($scheduleLink);
                                        $parentLink = 'https://live.merithub.com/info/room/' . $clientId . '/' . $getParticipantLink[0]->userLink;
                                        $participantLink =  $parentLink;
                                        $name = $getUserDetails->first_name . ' ' . $getUserDetails->last_name;
                                        $queueData = array('email' => $getUserDetails->email, "name" => $name, "hostLink" => $participantLink);
                                        $job = (new SendEmailJob($queueData));
                                        $on = \Carbon\Carbon::now()->addMinutes(1);
                                        dispatch($job)->delay($on);
                                    }
                                }
                            }
                            $getTutorDetails = UserHelper::getTutorDetailsByIdMerithub($tutor_id);
                            if ($getTutorDetails->type == '2') {
                                $queueData = array('email' => $getTutorDetails->email, "name" => $getTutorDetails->first_name, "hostLink" => $hostLink);
                                $job = (new SendEmailJob($queueData));
                                $on = \Carbon\Carbon::now()->addMinutes(1);
                                dispatch($job)->delay($on);
                            }
                        }
                    }
                }
                return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => '', 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'data' => array(), 'status' => 0], 500);
            }
        } else {
            $update = ParentDetailHelper::attendStudentlesson($request->id);
            if ($update) {
                return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => $update, 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'data' => array(), 'status' => 0], 500);
            }
        }
    }
    public function saveTutoringHours(Request $request)
    {
        $rules = array(
            'hours' => 'required | max:4',
            // 'hourly_rate' => 'required',
            'teaching_type' => 'required',
            'no_of_lessons' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error_msg' => $validator->errors(), 'status' => 0], 400);
        } else {
            if ($request->no_of_lessons == 1) {
                $update = ParentDetailHelper::saveHours($request->id, $request->hours, $request->minutes, $request->teaching_start_time, $request->teaching_type, $request->no_of_lessons);
            } elseif ($request->no_of_lessons > 1) {
                for ($i = 1; $i <= $request->no_of_lessons; $i++) {
                    if ($i == 1) {
                        $update = ParentDetailHelper::saveHours($request->id, $request->hours, $request->minutes, $request->teaching_start_time, $request->teaching_type, $request->no_of_lessons);
                    } else {
                        $getData = ParentDetailHelper::getInquiryDetails($request->id);
                        $dataArray = array(
                            'user_id' => $getData->user_id,
                            'tutor_id' => $getData->tutor_id,
                            'subject_id' => $getData->subject_id,
                            'level_id' => $getData->level_id,
                            'tuition_day' => $getData->tuition_day,
                            'tuition_time' => $getData->tuition_time,
                            'booking_date' => Carbon::parse($getData->booking_date)->addWeeks($i-1)->format('Y-m-d'),
                            'hourly_rate' => $getData->hourly_rate,
                            'teaching_start_time' => $getData->teaching_start_time,
                            'teaching_hours' => $getData->teaching_hours,
                            'teaching_type' => $getData->teaching_type,
                            'teaching_end_time' => $getData->teaching_end_time,
                            'inquiry_type' => $getData->inquiry_type,
                            'no_of_lessons' => $getData->no_of_lessons
                        );
                        $data = ParentDetailHelper::save($dataArray);
                    }
                }
            }
            if ($update) {
                return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => $update, 'status' => 1], 200);
            } else {

                return response()->json(['error_msg' => trans('messages.error'), 'data' => array(), 'status' => 0], 500);
            }
        }
    }
    public function sendPaymentMailTutor(Request $request)
    {
        $inquiryId = $request->inquiryId;
        $getRate = ParentDetailHelper::getHourlyRate($inquiryId);
        return json_encode($getRate);
    }
    public function sendBookingMail(Request $request)
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
                $html = '<p>' . $getUserData->tutorDetails->first_name . ' has sent you a payment request for subject ' . $getUserData->subjectDetails->main_title . '.</p>
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
                return response()->json(['error_msg' => "Payment mail are sending successfully. Please also check spam.", 'data' => $update, 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => "Sorry, something went wrong. Please try again.", 'data' => array(), 'status' => 0], 500);
            }
        } else {
            return response()->json(['error_msg' => "Sorry, something went wrong. Please try again.", 'data' => array(), 'status' => 0], 500);
        }
    }
    public function sendBookingNotificationAdmin(Request $request)
    {
        $inquiryId = $request->id;
        $getInquiry = ParentDetailHelper::getInquiryDetails($inquiryId);
        $getUser = UserHelper::getAdminData();
        $userId = $getUser->id;
        $sendNotification = User::find($userId);
        $details = [
            "greeting" => 'Add Hourly Rate Notification',
            'actionText' => 'Message',
            'body' => " is requested to include an hourly rate for this",
            'message_type' => 'message',
            'username' => $getInquiry->tutorDetails->first_name,
            'subjectname' => $getInquiry->subjectDetails->main_title,
            'parentid' => $getInquiry->user_id,
            'type' => 'Hourly Rate'
        ];
        if ($userId != '') {
            $sendNotification->notify(new AdminHourlyRateNotification($details));
            $notiData =  $sendNotification->notifications->first();
            $sendNotification->notifications()->where('id', $notiData['id']);
            $data = array(
                'notification_flag' => 1
            );
            $update = ParentDetailHelper::update($data, array('user_id' => $getInquiry->user_id, 'tutor_id' => $getInquiry->tutor_id, 'subject_id' => $getInquiry->subject_id, 'level_id' => $getInquiry->level_id, 'tuition_day' => $getInquiry->tuition_day, 'tuition_time' => $getInquiry->tuition_time));
            if ($update) {
                return response()->json(['error_msg' => "An Hourly Rate Notification Sent to Admin.", 'data' => '', 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => "Sorry, something went wrong. Please try again.", 'data' => array(), 'status' => 0], 500);
            }
        } else {
            return response()->json(['error_msg' => "Sorry, something went wrong. Please try again.", 'data' => array(), 'status' => 0], 500);
        }
    }
    public function addZoomDetails(Request $request)
    {
        $rules = array(
            'meeting_id' => 'required',
            'meeting_url' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error_msg' => $validator->errors(), 'status' => 0], 400);
        } else {
            $password = Hash::make($request->password);
            $update = ParentDetailHelper::updateZoomDetails($request->id, $request->meeting_id, $request->meeting_url,  $password);
            if ($update) {
                $getUserDetails = ParentDetailHelper::getParentDataById($request->id);
                $html = '<p>Here is the details for join zoom meeting</p><p><b>Meeting Url</b>: ' . $request->meeting_url . '<br/><b>Meeting Id</b>: ' . $request->meeting_id . '<br/><b>Meeting Password</b>: ' . $request->password . '</p>';
                $subject = __('emails.zoom_inquiry');
                $BODY = __('emails.zoom_inquiry_body', ['USERNAME' => $getUserDetails->userDetails->first_name . ' ' . $getUserDetails->userDetails->last_name, 'HTMLTABLE' => $html]);
                $body_email = __('emails.template', ['BODYCONTENT' => $BODY]);
                $mail = MailHelper::mail_send($body_email, $getUserDetails->userDetails->email, $subject);
                return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => $update, 'status' => 1], 200);
            } else {

                return response()->json(['error_msg' => trans('messages.error'), 'data' => array(), 'status' => 0], 500);
            }
        }
    }
}

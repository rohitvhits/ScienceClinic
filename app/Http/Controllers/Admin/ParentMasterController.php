<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MailHelper;
use App\Helpers\ParentDetailHelper;
use App\Helpers\TutorUniversityDetailHelper;
use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Session;

class ParentMasterController extends Controller
{
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
}

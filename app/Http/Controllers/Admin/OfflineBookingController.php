<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MailHelper;
use App\Helpers\ParentDetailHelper;
use App\Helpers\SubjectHelper;
use App\Helpers\TutorAvailabilityHelper;
use App\Helpers\TutorLevelHelper;
use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Session;

class OfflineBookingController extends Controller
{
    public function index()
    {
        $this->data['subject'] = SubjectHelper::getAllSubjectList();
        $this->data['level'] = TutorLevelHelper::getAllTutorList();
        $this->data['tutorData'] = UserHelper::getApprovedTutor();
        return view('admin.offline_bookings.index', $this->data);
    }
    public function ajaxList(Request $request)
    {
        $this->data['page'] = $request->page;
        $name = $request->name;
        $tutorName = $request->tutorName;
        $subjectName = $request->subjectName;
        $level = $request->level;
        $day = $request->day;
        $this->data['query'] = ParentDetailHelper::getOfflineBookings($name, $tutorName, $subjectName, $level, $day);
        return view('admin.offline_bookings.offline_bookings_ajax', $this->data);
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
    public function storeOfflineBooking(Request $request)
    {
        $id = Auth::user()->id;
        $rules = array(
            'sname' => 'required',
            'main_subject' => 'required',
            'tutor_name' => 'required',
            'level' => 'required',
            'day' => 'required',
            'idel_time' => 'required',
            'no_of_lessons' => 'required'
        );
        $messsages = array(
            'main_subject.required' => 'Please select Subject',
            'sname.required' => 'Please enter Student Name',
            'tutor_name.required' => 'Please select Tutor',
            'level.required' => 'Please select Level',
            'day.required' => 'Please select Day',
            'idel_time.required' => 'Please Enter Idel Time',
            'no_of_lessons.required' => 'Please Enter No of Lessons'
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->fails()) {
            return redirect("/offline-bookings?addpopup=1")
                ->withErrors($validator, 'booking')
                ->withInput();
        } else {
            $bookDate = array();
            $hours = 1;
            $finalEndTime = "";
            $time = Carbon::parse($request->idel_time);
            $endTime = $time->addHours($hours);
            $finalEndTime = $endTime;

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

            $bookDate = date('Y-m-d', strtotime($request->day . ' next week'));
            if (in_array(ucfirst($request->day), $dateArray)) {
                foreach ($dateArray as $key => $val) {
                    if (ucfirst($request->day) == $val) {
                        if ($key < date('Y-m-d')) {
                            $bookDate = date('Y-m-d', strtotime($request->day . ' next week'));
                        } else {
                            $bookDate = $key;
                        }
                    }
                }
            }
            $lastId = '';
            for ($i = 1; $i <= $request->no_of_lessons; $i++) {
                $email = '';
                if ($request->email != '') {
                    $email = $request->email;
                }
                if ($i == 1) {
                    $offlineUserInquiryData = array(
                        'user_id' => 0,
                        'tutor_id' => $request->tutor_name,
                        'subject_id' => $request->main_subject,
                        'level_id' => $request->level,
                        'tuition_day' => $request->day,
                        'tuition_time' =>  date("H:i:s", strtotime($request->idel_time)),
                        'booking_date' => $bookDate,
                        'teaching_start_time' => date("H:i:s", strtotime($request->idel_time)),
                        'teaching_end_time' => $finalEndTime,
                        'inquiry_type' => 2,
                        'email' => $email,
                        'user_name' => $request->sname,
                        'payment_status' => "Success",
                        'created_by' => $id,
                        'no_of_lessons' => $request->no_of_lessons
                    );
                    $saveData = ParentDetailHelper::save($offlineUserInquiryData);
                    $lastId = $saveData;
                    $updateData = ParentDetailHelper::update(array('main_id' => $lastId), array('id' => $lastId));
                } else {
                    $offlineUserInquiryData = array(
                        'user_id' => 0,
                        'tutor_id' => $request->tutor_name,
                        'subject_id' => $request->main_subject,
                        'level_id' => $request->level,
                        'tuition_day' => $request->day,
                        'tuition_time' =>  date("H:i:s", strtotime($request->idel_time)),
                        'booking_date' => Carbon::parse($bookDate)->addWeeks($i - 1)->format('Y-m-d'),
                        'teaching_start_time' => date("H:i:s", strtotime($request->idel_time)),
                        'teaching_end_time' => $finalEndTime,
                        'inquiry_type' => 2,
                        'email' => $email,
                        'user_name' => $request->sname,
                        'payment_status' => "Success",
                        'created_by' => $id,
                        'no_of_lessons' => $request->no_of_lessons,
                        'main_id' => $lastId
                    );
                    $saveData = ParentDetailHelper::save($offlineUserInquiryData);
                }
            }
            if ($saveData) {
                Session::flash('success', trans('messages.addedSuccessfully'));
                return redirect('offline-bookings');
            } else {
                Session::flash('error', trans('messages.error'));
                return redirect('offline-bookings');
            }
        }
    }
    public function checkTutorAvalibility(Request $request)
    {
        $tutorId = $request->id;
        $idelTime = date('H:i:s', strtotime($request->idelTime));
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

        $bookDate = date('Y-m-d', strtotime($request->day . ' next week'));

        if (in_array(ucfirst($request->day), $dateArray)) {
            foreach ($dateArray as $key => $val) {
                if (ucfirst($request->day) == $val) {
                    if ($key < date('Y-m-d')) {
                        $bookDate = date('Y-m-d', strtotime($request->day . ' next week'));
                    } else {
                        $bookDate = $key;
                    }
                }
            }
        }
        $dayTime = $bookDate . ' ' . $idelTime;
        $checkAvalibility = TutorAvailabilityHelper::checkAvalibility($tutorId, $dayTime);
        if ($checkAvalibility) {
            return 1;
        } else {
            return 0;
        }
    }
    public function editOfflineBooking(Request $request)
    {
        $id = $request->id;
        $dataId = $request->dataId;
        if($dataId){
            $this->data['bookingDate'] = ParentDetailHelper::getOfflineBookingDate($dataId);
        }
        $this->data['bookingDetails'] = ParentDetailHelper::getOfflineBookingDetails($id);
        return json_encode($this->data);
    }
    public function updateOfflineBooking(Request $request)
    {
        $adminId = Auth::user()->id;
        $mainId = $request->main_id_edit;
        $rules = array(
            'sname_edit' => 'required',
            'main_subject_edit' => 'required',
            'level_edit' => 'required',
            'day_edit' => 'required',
            'idel_time_edit' => 'required',
            'tutor_name_edit' => 'required'
        );
        $messsages = array(
            'main_subject_edit.required' => 'Please select Subject',
            'sname_edit.required' => 'Please enter Student Name',
            'level_edit.required' => 'Please select Level',
            'day_edit.required' => 'Please select Day',
            'idel_time_edit.required' => 'Please Enter Ideltime',
            'tutor_name_edit.required' => 'Please Select Tutor'
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->fails()) {
            return redirect("/offline-bookings?editpopup=1&id=" . $mainId)
                ->withErrors($validator, 'booking_edit')
                ->withInput();
        } else {
            if($request->no_of_lessons_edit != null){
                $bookDate = array();
                $hours = 1;
                $finalEndTime = "";
                $time = Carbon::parse($request->idel_time_edit);
                $endTime = $time->addHours($hours);
                $finalEndTime = $endTime;
    
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
    
                $bookDate = date('Y-m-d', strtotime($request->day_edit . ' next week'));
                if (in_array(ucfirst($request->day_edit), $dateArray)) {
                    foreach ($dateArray as $key => $val) {
                        if (ucfirst($request->day_edit) == $val) {
                            if ($key < date('Y-m-d')) {
                                $bookDate = date('Y-m-d', strtotime($request->day_edit . ' next week'));
                            } else {
                                $bookDate = $key;
                            }
                        }
                    }
                }
                $checkDate = Carbon::createFromFormat('Y-m-d', $bookDate)->isPast();
                $checkTodayDate = Carbon::createFromFormat('Y-m-d', $bookDate)->isToday();
                $lastId = '';
                for ($i = 1; $i <= $request->no_of_lessons_edit; $i++) {
                    $email = '';
                    if ($request->email_edit != '') {
                        $email = $request->email_edit;
                    }
                    if ($i == 1) {
                        if($checkDate == false){
                            $offlineUserInquiryData = array(
                                'user_id' => 0,
                                'tutor_id' => $request->tutor_name_edit,
                                'subject_id' => $request->main_subject_edit,
                                'level_id' => $request->level_edit,
                                'tuition_day' => $request->day_edit,
                                'tuition_time' =>  date("H:i:s", strtotime($request->idel_time_edit)),
                                'booking_date' => $bookDate,
                                'teaching_start_time' => date("H:i:s", strtotime($request->idel_time_edit)),
                                'teaching_end_time' => $finalEndTime,
                                'inquiry_type' => 2,
                                'email' => $email,
                                'user_name' => $request->sname_edit,
                                'payment_status' => "Success",
                                'created_by' => $adminId,
                                'no_of_lessons' => $request->no_of_lessons_edit
                            ); 
                        }
                        else{
                            $offlineUserInquiryData = array(
                                'user_id' => 0,
                                'tutor_id' => $request->tutor_name_edit,
                                'subject_id' => $request->main_subject_edit,
                                'level_id' => $request->level_edit,
                                'tuition_day' => $request->day_edit,
                                'tuition_time' =>  date("H:i:s", strtotime($request->idel_time_edit)),
                                'booking_date' => Carbon::parse($bookDate)->addWeeks($i)->format('Y-m-d'),
                                'teaching_start_time' => date("H:i:s", strtotime($request->idel_time_edit)),
                                'teaching_end_time' => $finalEndTime,
                                'inquiry_type' => 2,
                                'email' => $email,
                                'user_name' => $request->sname_edit,
                                'payment_status' => "Success",
                                'created_by' => $adminId,
                                'no_of_lessons' => $request->no_of_lessons_edit
                            );
                        }
                        $saveData = ParentDetailHelper::save($offlineUserInquiryData);
                        $lastId = $saveData;
                        $updateData = ParentDetailHelper::update(array('main_id' => $lastId), array('id' => $lastId));
                    } else {
                        if($checkTodayDate == true){
                            $offlineUserInquiryData = array(
                                'user_id' => 0,
                                'tutor_id' => $request->tutor_name_edit,
                                'subject_id' => $request->main_subject_edit,
                                'level_id' => $request->level_edit,
                                'tuition_day' => $request->day_edit,
                                'tuition_time' =>  date("H:i:s", strtotime($request->idel_time_edit)),
                                'booking_date' => Carbon::parse($bookDate)->addWeeks($i)->format('Y-m-d'),
                                'teaching_start_time' => date("H:i:s", strtotime($request->idel_time_edit)),
                                'teaching_end_time' => $finalEndTime,
                                'inquiry_type' => 2,
                                'email' => $email,
                                'user_name' => $request->sname_edit,
                                'payment_status' => "Success",
                                'created_by' => $adminId,
                                'no_of_lessons' => $request->no_of_lessons_edit,
                                'main_id' => $lastId
                            ); 
                        }
                        else{
                            $offlineUserInquiryData = array(
                                'user_id' => 0,
                                'tutor_id' => $request->tutor_name_edit,
                                'subject_id' => $request->main_subject_edit,
                                'level_id' => $request->level_edit,
                                'tuition_day' => $request->day_edit,
                                'tuition_time' =>  date("H:i:s", strtotime($request->idel_time_edit)),
                                'booking_date' => Carbon::parse($bookDate)->addWeeks($i-1)->format('Y-m-d'),
                                'teaching_start_time' => date("H:i:s", strtotime($request->idel_time_edit)),
                                'teaching_end_time' => $finalEndTime,
                                'inquiry_type' => 2,
                                'email' => $email,
                                'user_name' => $request->sname_edit,
                                'payment_status' => "Success",
                                'created_by' => $adminId,
                                'no_of_lessons' => $request->no_of_lessons_edit,
                                'main_id' => $lastId
                            );
                        }
                        $saveData = ParentDetailHelper::save($offlineUserInquiryData);
                    }
                }
                if ($saveData) {
                    Session::flash('success', trans('messages.updatedSuccessfully'));
                    return redirect('offline-bookings');
                } else {
                    Session::flash('error', trans('messages.error'));
                    return redirect('offline-bookings');
                }
            }
            else{
                $hours = 1;
                $finalEndTime = "";
                $time = Carbon::parse($request->idel_time_edit);
                $endTime = $time->addHours($hours);
                $finalEndTime = $endTime;
    
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
    
                $bookDate = date('Y-m-d', strtotime($request->day_edit . ' next week'));
    
                if (in_array(ucfirst($request->day_edit), $dateArray)) {
                    foreach ($dateArray as $key => $val) {
                        if (ucfirst($request->day_edit) == $val) {
                            if ($key < date('Y-m-d')) {
                                $bookDate = date('Y-m-d', strtotime($request->day_edit . ' next week'));
                            } else {
                                $bookDate = $key;
                            }
                        }
                    }
                }
                $email = '';
                if($request->email_edit != ''){
                    $email = $request->email_edit;
                }
                $offlineUserInquiryData = array(
                    'user_id' => 0,
                    'tutor_id' => $request->tutor_name_edit,
                    'subject_id' => $request->main_subject_edit,
                    'level_id' => $request->level_edit,
                    'tuition_day' => $request->day_edit,
                    'tuition_time' =>  date("H:i:s", strtotime($request->idel_time_edit)),
                    'booking_date' => $bookDate,
                    'teaching_start_time' => date("H:i:s", strtotime($request->idel_time_edit)),
                    'teaching_end_time' => $finalEndTime,
                    'inquiry_type' => 2,
                    'email' => $email,
                    'user_name' => $request->sname_edit,
                    'payment_status' => "Success",
                    'updated_by' => $adminId
    
                );
                $updateData = ParentDetailHelper::update($offlineUserInquiryData, array('id' => $mainId));
                if ($updateData) {
                    Session::flash('success', trans('messages.updatedSuccessfully'));
                    return redirect('offline-bookings');
                } else {
                    Session::flash('error', trans('messages.error'));
                    return redirect('offline-bookings');
                }   
            }
        }
    }
    public function deleteOfflineBooking(Request $request)
    {
        $id = $request->id;
        $update = ParentDetailHelper::SoftDelete(array(), array('id' => $id));
        if ($update) {
            return response()->json(['error_msg' => trans('messages.deletedSuccessfully'), 'data' => array(), 'status' => 1], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error_msg'), 'data' => array(), 'status' => 0], 500);
        }
    }
    public function checkUniqueEnquiry(Request $request)
    {
        $hours = 1;
        $finalEndTime = "";
        $time = Carbon::parse($request->ideltime);
        $endTime = $time->addHours($hours);
        $finalEndTime = $endTime;

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

        $bookDate = date('Y-m-d', strtotime($request->day . ' next week'));

        if (in_array(ucfirst($request->day), $dateArray)) {
            foreach ($dateArray as $key => $val) {
                if (ucfirst($request->day) == $val) {
                    if ($key < date('Y-m-d')) {
                        $bookDate = date('Y-m-d', strtotime($request->day . ' next week'));
                    } else {
                        $bookDate = $key;
                    }
                }
            }
        }
        $idelTime = date("H:i:s", strtotime($request->ideltime));
        $data = ParentDetailHelper::checkUniqueEntry($request->subjectname, $request->level, $bookDate, $idelTime, $request->tutorid, $request->id);
        if ($data == '0') {
            return response()->json(['status' => 0]);
        } else {
            return response()->json(['status' => 1]);
        }
    }
}

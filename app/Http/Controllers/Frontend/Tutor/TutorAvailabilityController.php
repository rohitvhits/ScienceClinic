<?php

namespace App\Http\Controllers\Frontend\Tutor;

use App\Helpers\ParentDetailHelper;
use App\Helpers\SubjectHelper;
use App\Helpers\TutorAvailabilityHelper;
use App\Helpers\TutorFormHelper;
use App\Helpers\TutorLevelHelper;
use App\Models\TutorForm;
use App\Models\ParentDetail;
use App\Models\TutorStudent;
use App\Models\StudentMaster;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redis;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class TutorAvailabilityController extends Controller
{
    public function index()
    {
        return view('frontend.tutor.tutor_booking');
    }
    public function tutorAvailability()
    {
        return view('frontend.tutor.tutor_availability');
    }
    public function tutorMissedLesson()
    {
        return view('frontend.tutor.tutor-missed-lessons');
    }
    public function getTutorAvailabilityDetails()
    {
        $userId = Auth::user()->id;
        $data = TutorAvailabilityHelper::getData($userId);
        return response()->json($data);
    }
    public function getBookedSlot(Request $request){
        $id = $request->id;
        $data = TutorAvailabilityHelper::checkBooking($id);
        if($data){
            $getDateTime = explode(' ',$data->available_datetime);
            $date = $getDateTime[0];
            $startTime = $getDateTime[1];
            $endTime = Carbon::parse($startTime)->addHour();
            $tutorId = $data->tutor_id;
            $checkBooking = ParentDetailHelper::checkParentBooking($date, $startTime, $endTime, $tutorId);
            if($checkBooking){
                return 1;
            }
            else{
                return 0;
            }
        }
    }
    public function deleteSlot(Request $request){
        $id = $request->id;
        $update = TutorAvailabilityHelper::SoftDelete(array(),array('id'=>$id));
        if ($update) {
            return response()->json(['success_message' => trans('messages.deletedSuccessfully'), 'status' => 1 ]);
        }
        else {
            return response()->json(['error_message' =>  trans('messages.error'), 'status' => 0 ]);
        }
    }
    public function deleteBookingSlot(Request $request){
        $id = $request->id;
        $typ = $request->typ;
        if(!empty($id) && !empty($typ))
        {
            if($typ=='offline')
            {
                $update = ParentDetailHelper::SoftDelete(array(), array('id' => $id));
            }
            elseif($typ=='online')
            {
                $update = TutorFormHelper::SoftDelete(array(),array('id'=>$id));
            }
        }
        if ($update) {
            return response()->json(['success_message' => trans('messages.deletedSuccessfully'), 'status' => 1 ]);
        }
        else {
            return response()->json(['error_message' =>  trans('messages.error'), 'status' => 0 ]);
        }
    }
    public function addTutorAvailability(Request $request)
    {
        $lessons = $request->no_of_lessons;
        for ($i = 0; $i < $lessons; $i++) {
            $dateTime = array();
            $data = explode("T", $request->date);
            $dateTime[] = Carbon::parse($data[0])->addWeeks($i)->format('Y-m-d');
            $data1 = explode("+", $data[1]);
            $dateTime[] = $data1[0];
            $finalDateTime = implode(" ", $dateTime);
            $finalArr = array(
                'tutor_id' => $request->tutor_id,
                'available_datetime' => $finalDateTime,
            );
            $userData = TutorAvailabilityHelper::save($finalArr);
        }
        if ($userData) {
            return response()->json(['error_msg' => "Successfully Updated", 'data' => $userData], 200);
        } else {
            return response()->json(['error_msg' => "Something Went Wrong", 'data' => ''], 400);
        }
    }

    public function getBookedSlotData(Request $request)
    {

        $parentData = ParentDetailHelper::getBookSlotData($request->subject_id, $request->user_id);
        return response()->json($parentData);
    }

    public function showBookedslots($userId, $time)
    {

        $parentData['bookslots'] = ParentDetailHelper::getBookSlotData($time);
        return view('frontend.tutor.tutor_booked_slot_details', $parentData);
    }

    public function editBookSlot(Request $request)
    {
        $data = ParentDetailHelper::getBookSlotDataById($request->id, $request->time);
        return response()->json($data);
    }
    public function updateBookSlot(Request $request)
    {
        $rules = array(
            'time' => 'required',

            'day' => 'required',

        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
        } else {


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

            $dataArr = array(
                'tuition_day' => $request->day,
                'tuition_time' => $request->time,
                'booking_date' => $bookDate,
            );

            $data = ParentDetailHelper::update($dataArr, array('id' => $request->id));
            if ($data) {
                return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'status' => 0, 'data' => array($dataArr)], 200);
            } else {
                return response()->json(['error_msg' => "", 'status' => 1, 'data' => array()], 400);
            }
        }
    }

    public function cancelSlot(Request $request)
    {
        $update = ParentDetailHelper::update(array('booking_status' => 'Cancelled'), array('id' => $request->userId));
        if ($update) {
            return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'status' => 1, 'data' => array()], 200);
        } else {
            return response()->json(['error_msg' => "", 'status' => 0, 'data' => array()], 400);
        }
    }
    public function getTutorBookingsDetails(Request $request)
    {
        // $userId = Auth::user()->id;        
        $auth = Auth::guard('web')->user();
        $userId = $auth['id'];
        $userName = $auth['first_name'];
        if(!empty($auth['last_name']))
        {
            $userName .= ' '.$auth['last_name'];
            $userName=trim($userName);
        }
        // $data = ParentDetailHelper::getBooklessondataTutor($userId);
        $online = TutorForm::where([['tutor_name','=',$userName]])->get();
        $offline =  ParentDetail::with(['tutorDetails', 'subjectDetails', 'levelDetails'])->select('id', 'tuition_day', 'tutor_id', 'subject_id', 'attend_class', 'tutor_reject_reason', 'teaching_start_time', 'booking_date', 'user_name as userName', 'level_id', 'email as userEmail', 'created_by as createdBy','main_id')
            ->whereHas('subjectDetails', function ($subjectQuery) {
                $subjectQuery->whereNull('deleted_at');
            })
            ->whereHas('tutorDetails', function ($queryVal) {
                $queryVal->where('status', 'Accepted');
            })->where('inquiry_type', '2')->where('tutor_id', $userId)->whereNotNull('user_name')->whereNull('deleted_at')->get();
        $data=array('online'=>$online,'offline'=>$offline);
        return response()->json($data);
    }
    public function paginate($items, $perPage = 10, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }
    public function missedLessonAjax(Request $request)
    {
        $getUser = Auth()->user()->id;
        $currentTime = date('Y-m-d H:i:s');
        if ($request->input('page')) {
            $this->data['page'] = $request->input('page');
        } else {
            $this->data['page'] = 1;
        }
        $getMissedLesson = ParentDetailHelper::getMissedLesson($getUser);
        $mainArray = array();
        if (count($getMissedLesson) > 0) {
            foreach ($getMissedLesson as $val) {
                $dateTime = $val->booking_date . ' ' . $val->teaching_start_time;
                if ($dateTime <= $currentTime) {
                    $mainArray[] = $val;
                }
            }
        }
        $this->data['query'] = $mainArray;
        $paginationData = $this->paginate($mainArray);
        $this->data['data'] = $paginationData->withPath('tutor-missed-lessons');
        return view('frontend.tutor.tutor-missed-lessons-ajax', $this->data);
    }
    public function addMissedLessonReason(Request $request)
    {
        $dataArr = array(
            'tutor_reject_reason' => $request->reason
        );
        $data = ParentDetailHelper::update($dataArr, array('id' => $request->id));
        if ($data) {
            return response()->json(['success_msg' => trans('messages.updatedSuccessfully'), 'status' => 1, 'data' => ''], 200);
        } else {
            return response()->json(['error_msg' => "", 'status' => 0, 'data' => array()], 400);
        }
    }
    public function tutorOfflineBooking()
    {
        $this->data['subject'] = SubjectHelper::getAllSubjectList();
        $this->data['level'] = TutorLevelHelper::getAllTutorList();
        $auth = auth()->user();
        $userId = $auth['id'];
        $this->data['parentslist'] = StudentMaster::orderBy('sc_student_master.student_name', 'asc')->select(['id','student_name'])->get();
        return view('frontend.tutor.tutor-offline-booking', $this->data);
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
        $tutorId = Auth::user()->id;
        $rules = array(
            'sname' => 'required',
            'main_subject' => 'required',
            'level' => 'required',
            'day' => 'required',
            'idel_time' => 'required',
            'no_of_lessons' => 'required'
        );
        $messsages = array(
            'main_subject.required' => 'Please select Subject',
            'sname.required' => 'Please enter Student Name',
            'level.required' => 'Please select Level',
            'day.required' => 'Please select Day',
            'idel_time.required' => 'Please Enter Ideltime',
            'no_of_lessons.required' => 'Please Enter No of Lessons'
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->fails()) {
            return redirect("/tutor-offline-booking?addpopup=1")
                ->withErrors($validator, 'booking')
                ->withInput();
        } else {
            $ts=explode('_',$request->sname);
            $sid=$ts[0];
            $sname=$ts[1];
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
                        'tutor_id' => $tutorId,
                        'subject_id' => $request->main_subject,
                        'level_id' => $request->level,
                        'tuition_day' => $request->day,
                        'tuition_time' =>  date("H:i:s", strtotime($request->idel_time)),
                        'booking_date' => $bookDate,
                        'teaching_start_time' => date("H:i:s", strtotime($request->idel_time)),
                        'teaching_end_time' => $finalEndTime,
                        'inquiry_type' => 2,
                        'email' => $email,
                        'user_name' => $sname,
                        'payment_status' => "Success",
                        'created_by' => $tutorId,
                        'no_of_lessons' => $request->no_of_lessons
                    );
                    $saveData = ParentDetailHelper::save($offlineUserInquiryData);
                    $lastId = $saveData;
                    $updateData = ParentDetailHelper::update(array('main_id' => $lastId), array('id' => $lastId));
                } else {
                    $offlineUserInquiryData = array(
                        'user_id' => 0,
                        'tutor_id' => $tutorId,
                        'subject_id' => $request->main_subject,
                        'level_id' => $request->level,
                        'tuition_day' => $request->day,
                        'tuition_time' =>  date("H:i:s", strtotime($request->idel_time)),
                        'booking_date' => Carbon::parse($bookDate)->addWeeks($i - 1)->format('Y-m-d'),
                        'teaching_start_time' => date("H:i:s", strtotime($request->idel_time)),
                        'teaching_end_time' => $finalEndTime,
                        'inquiry_type' => 2,
                        'email' => $email,
                        'user_name' => $sname,
                        'payment_status' => "Success",
                        'created_by' => $tutorId,
                        'no_of_lessons' => $request->no_of_lessons,
                        'main_id' => $lastId
                    );
                    $saveData = ParentDetailHelper::save($offlineUserInquiryData);
                }
            }
            if ($saveData) {
                $checkS=TutorStudent::where([['tutor_id','=',$tutorId],['student_id','=',$sid]])->first();
                if($checkS)
                {

                }
                else
                {
                    $ads=new TutorStudent();
                    $ads->tutor_id=$tutorId;
                    $ads->student_id=$sid;
                    $ads->created_by=$tutorId;
                    $ads->created_at=date('Y-m-d H:i:s');
                    $ads->save();
                }
                Session::flash('success', trans('messages.addedSuccessfully'));
                return redirect('tutor-offline-booking');
            } else {
                Session::flash('error', trans('messages.error'));
                return redirect('tutor-offline-booking');
            }
        }
    }
    public function getOfflineBookingAjax(Request $request){
        $tutorId = Auth::user()->id;
        if ($request->input('page')) {
            $this->data['page'] = $request->input('page');
        } else {
            $this->data['page'] = 1;
        }
        $this->data['data'] = ParentDetailHelper::getOfflineBooking($tutorId);
        return view('frontend.tutor.tutor-offline-booking-ajax', $this->data);
    }
    public function editOfflineBooking(Request $request){
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
        $tutorId = Auth::user()->id;
        $mainId = $request->main_id_edit;
        $rules = array(
            'sname_edit' => 'required',
            'main_subject_edit' => 'required',
            'level_edit' => 'required',
            'day_edit' => 'required',
            'idel_time_edit' => 'required',
        );
        $messsages = array(
            'main_subject_edit.required' => 'Please select Subject',
            'sname_edit.required' => 'Please enter Student Name',
            'level_edit.required' => 'Please select Level',
            'day_edit.required' => 'Please select Day',
            'idel_time_edit.required' => 'Please Enter Ideltime'
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->fails()) {
            return redirect("/tutor-offline-booking?editpopup=1&id=" . $mainId)
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
                                'tutor_id' => $tutorId,
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
                                'created_by' => $tutorId,
                                'no_of_lessons' => $request->no_of_lessons_edit
                            ); 
                        }
                        else{
                            $offlineUserInquiryData = array(
                                'user_id' => 0,
                                'tutor_id' => $tutorId,
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
                                'created_by' => $tutorId,
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
                                'tutor_id' => $tutorId,
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
                                'created_by' => $tutorId,
                                'no_of_lessons' => $request->no_of_lessons_edit,
                                'main_id' => $lastId
                            ); 
                        }
                        else{
                            $offlineUserInquiryData = array(
                                'user_id' => 0,
                                'tutor_id' => $tutorId,
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
                                'created_by' => $tutorId,
                                'no_of_lessons' => $request->no_of_lessons_edit,
                                'main_id' => $lastId
                            );
                        }
                        $saveData = ParentDetailHelper::save($offlineUserInquiryData);
                    }
                }
                if ($saveData) {
                    Session::flash('success', trans('messages.updatedSuccessfully'));
                    return redirect('tutor-offline-booking');
                } else {
                    Session::flash('error', trans('messages.error'));
                    return redirect('tutor-offline-booking');
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
                    'tutor_id' => $tutorId,
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
                    'payment_status' => "Success"
    
                );
                $updateData = ParentDetailHelper::update($offlineUserInquiryData, array('id' => $mainId));
                if ($updateData) {
                    Session::flash('success', trans('messages.updatedSuccessfully'));
                    return redirect('tutor-offline-booking');
                } else {
                    Session::flash('error', trans('messages.error'));
                    return redirect('tutor-offline-booking');
                }   
            }
        }
    }
    public function deleteOfflineBooking(Request $request){
        $id = $request->id;
        $update = ParentDetailHelper::SoftDelete(array(), array('id' => $id));
        if ($update) {
            return response()->json(['error_msg' => trans('messages.deletedSuccessfully'), 'data' => array(), 'status' => 1], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error_msg'),'data' => array(), 'status' => 0], 500);
        }
    }
    public function attendOfflineBooking(Request $request)
    {
        $id = $request->id;
        $update = ParentDetailHelper::update(array('attend_class'=>'1', 'updated_at' => date('Y-m-d H:i:s')), array('id' => $id));
        if ($update) {
            return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), 'data' => array(), 'status' => 1], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error_msg'), 'data' => array(), 'status' => 0], 500);
        }
    }
    public function checkUniqueEnquiry(Request $request){
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
        $tutorId = Auth::user()->id;
        $idelTime = date("H:i:s", strtotime($request->ideltime));
        $counter = ParentDetailHelper::checkUniqueEntry($request->subjectname,$request->level,$bookDate, $idelTime,$tutorId,$request->id);


        $auth = Auth::guard('web')->user();
        $userId = $auth['id'];
        if($userId==454)
        {
            $userName = $auth['first_name'];
            if(!empty($auth['last_name']))
            {
                $userName .= ' '.$auth['last_name'];
                $userName=trim($userName);
            }
            $checkOldBooking = TutorForm::where([['tutor_name','=',$userName],['day_of_tution','=',$request->day]])->whereNull('deleted_at')->get();
            foreach($checkOldBooking as $key => $cbVal)
            {
                $startTime=date("H:i:s", strtotime($request->ideltime));
                $tse=explode('-', $cbVal->tution_time);
                $tse2=explode(' ', $finalEndTime);
                if($startTime>=$tse[0] && $startTime<=$tse[1])
                {
                    $counter=1;
                }
                elseif($tse2[1]>=$tse[0] && $tse2[1]<=$tse[1])
                {
                    $counter=1;
                }
            }
        }

       if($counter == '0'){
            return response()->json(['status' => 0]);
       }else{
            return response()->json(['status' => 1]);
       }
    }
}

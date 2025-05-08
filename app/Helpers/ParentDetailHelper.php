<?php



namespace App\Helpers;

use App\Models\ParentDetail;
use Carbon\Carbon;

class ParentDetailHelper
{

    public static function save($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');

        $insert = new ParentDetail($data);
        $insert->save();
        $insertId = $insert->id;
        return $insertId;
    }
    public static function update($data, $where)

    {
        $userId = Auth()->user();
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($userId) {
            $data['updated_by'] = $userId['id'];
        }
        $update = ParentDetail::where($where)->update($data);

        return $update;
    }
    public static function softDelete($data, $where)
    {
        $userId = Auth()->user();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $userId['id'];
        $update = ParentDetail::where($where)->update($data);
        return $update;
    }
    public static function attendStudentlesson($id)
    {
        return ParentDetail::where('id', $id)->update(array('attend_class' => '1', 'updated_at' => date('Y-m-d H:i:s')));
    }
    public static function getMerithubStudentlesson($tutorId, $subjectId, $teachingType)
    {
        return ParentDetail::where('tutor_id', $tutorId)->where('teaching_type', $teachingType)->where('schedule_class', 0)->where('subject_id', $subjectId)->whereDate('booking_date', date('Y-m-d'))->get();
    }
    public static function getScheduledMerithubStudentlesson($tutorId, $subjectId, $teachingType)
    {
        return ParentDetail::where('tutor_id', $tutorId)->where('teaching_type', $teachingType)->where('schedule_class', 1)->where('subject_id', $subjectId)->whereNull('api_response')->whereDate('booking_date', date('Y-m-d'))->get();
    }
    public static function attendMerithubStudentlesson($id, $tutorId, $subjectId)
    {
        return ParentDetail::where('id', $id)->where('tutor_id', $tutorId)->where('subject_id', $subjectId)->whereDate('booking_date', date('Y-m-d'))->update(array('attend_class' => '1', 'updated_at' => date('Y-m-d H:i:s'), 'schedule_class' => 1));
    }
    public static function getBooklessondata($id)
    {
        return ParentDetail::with('tutorDetails', 'subjectDetails', 'levelDetails')->where('user_id', $id)->where('payment_status', 'Success')->get();
    }
    public static function getBooklessondataTutor($id)
    {
        return ParentDetail::with('userDetails', 'subjectDetails', 'levelDetails')->where('tutor_id', $id)->where('payment_status', 'Success')->where('booking_status', 'Success')->whereNull('deleted_at')->get();
    }
    public static function getUserDetails($id)
    {
        return ParentDetail::with('tutorDetails', 'userDetails', 'subjectDetails', 'levelDetails')->find($id);
    }
    public static function getPaymenttoken($token)
    {
        return ParentDetail::where('payment_token', $token)->first();
    }
    public static function getListwithPaginate($id)
    {

        $query = ParentDetail::with(['tutorDetails', 'subjectDetails', 'levelDetails'])->whereNull('deleted_at')->where('user_id', $id)->get();
        return $query;
    }
    public static function getListwithPaginateWithParent($parentID, $id)
    {

        $query = ParentDetail::with(['tutorDetails', 'subjectDetails', 'levelDetails', 'teachingTypeDetails'])->whereNull('deleted_at')->where('user_id', $parentID)->where('tutor_id', $id)->whereDate('booking_date', '>=', date('Y-m-d'))->get();
        return $query;
    }
    public static function getBookSlotData($time)
    {
        return ParentDetail::with('userDetails', 'subjectDetails')->where('tuition_time', $time)->where('booking_status', 'Success')->get();
    }

    public static function getBookSlotDataById($userId, $time)
    {
        return ParentDetail::where('tuition_time', $time)->where('id', $userId)->first();
    }
    public static function getTutorListwithPaginate($id)
    {


        $query = ParentDetail::selectRaw('sc_tutor_level_details.*,sb.main_title,GROUP_CONCAT(level.title) as level_name')->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })->where('sc_tutor_level_details.tutor_id', $id)->groupBy('sb.id')->paginate(10);


        return $query;
    }
    public static function saveHours($id, $hours, $minutes, $teaching_start_time, $teaching_type, $no_of_lessons)
    {
        $finalEndTime = "";
        $time = Carbon::parse($teaching_start_time);
        $endTime = $time->addHours($hours);
        $finalEndTime = $endTime;
        if ($minutes != '') {
            $finalEndTime = $endTime->addMinutes($minutes);
            $hours = $hours . '.' . $minutes;
        }
        $arrData = array(
            'teaching_hours' => $hours,
            'teaching_type' => $teaching_type,
            'teaching_start_time' => date("H:i:s", strtotime($teaching_start_time)),
            'teaching_end_time' => $finalEndTime,
            'no_of_lessons' => $no_of_lessons
        );
        $query = ParentDetail::where('id', $id)->update($arrData);
        return $query;
    }
    public static function getAllInquiry($id)
    {
        $query = ParentDetail::whereHas('userDetails', function($q){
            $q->where('status','Accepted');
        })->whereNull('deleted_at')->where('user_id', $id)->where('booking_status', 'Success')->groupBy('subject_id')->pluck('tutor_id')->toArray();
        return $query;
    }
    public static function getSubjectInquiry($id)
    {
        $query = ParentDetail::with('subSubjectDetails')->whereNull('deleted_at')->where('user_id', $id)->where('booking_status', 'Success')->groupBy('subject_id')->get();
        return $query;
    }
    public static function getParentsByBookings($parentId)
    {
        return ParentDetail::with(['tutorDetails', 'userDetails', 'subjectDetails'])->where('payment_status', 'Success')->where('booking_status', 'Success')->where('user_id', $parentId)->paginate(10);
    }
    public static function getParentDetailsById($id)
    {
        return ParentDetail::where('id', $id)->first();
    }
    public static function getMissedLesson($id)
    {
        $query =  ParentDetail::with(['tutorDetails', 'subjectDetails'])->select('id', 'tuition_day', 'tutor_id', 'subject_id', 'attend_class', 'tutor_reject_reason', 'teaching_start_time', 'booking_date')
            ->whereHas('subjectDetails', function ($subjectQuery) {
                $subjectQuery->whereNull('deleted_at');
            })
            ->whereHas('tutorDetails', function ($queryVal) use ($id){
                $queryVal->where('status', 'Accepted');
                $queryVal->where('id', $id);
            })
            ->where('attend_class', '0')
            ->where('booking_status', 'Success')
            ->where('payment_status', 'Success')
            ->get();
        return $query;
    }
    public static function getPaidParentListWithPaginate($id)
    {
        $query =  ParentDetail::with(['userDetails', 'tutorDetails', 'subjectDetails'])->select('id', 'user_id', 'booking_date', 'payment_status', 'subject_id', 'tutor_id')
            ->whereHas('userDetails', function ($queryVal) {
                $queryVal->where('status', 'Accepted');
            })
            ->whereHas('subjectDetails', function ($subjectQuery) {
                $subjectQuery->whereNull('deleted_at');
            })
            ->whereHas('tutorDetails', function ($tutorVal) {
                $tutorVal->where('status', 'Accepted');
            })
            ->where('user_id', $id)
            ->where('payment_status', 'Success')
            ->where('booking_status', 'Success')
            ->paginate(10);
        return $query;
    }
    public static function getParentData($id)
    {
        $query =  ParentDetail::with('userDetails')->whereHas('userDetails', function ($queryVal) {
            $queryVal->where('status', 'Accepted');
            $queryVal->whereNull('deleted_at');
            $queryVal->orderBy('id', 'desc');
        })
            ->where('tutor_id', $id)
            ->groupBy('user_id')
            ->paginate(10);
        return $query;
    }
    public static function getSubjectDetails($id, $tutorId, $subjectId)
    {
        return ParentDetail::with('subjectDetails')->where('id', $id)->where('tutor_id', $tutorId)->where('subject_id', $subjectId)->whereDate('booking_date', date('Y-m-d'))
            ->whereHas('subjectDetails', function ($subjectQuery) {
                $subjectQuery->whereNull('deleted_at');
            })
            ->first();
    }
    public static function updateResponse($subject_id, $id, $data)
    {
        $query = ParentDetail::where('subject_id', $subject_id)->where('tutor_id', $id)->whereDate('booking_date', date('Y-m-d'))->update($data);
        return $query;
    }
    public static function getFeedbackDataById($uniqueId)
    {
        return ParentDetail::with('subjectDetails')->where('id', $uniqueId)->first();
    }
    public static function getOfflineBooking($tutorId)
    {
        $query =  ParentDetail::with(['tutorDetails', 'subjectDetails', 'levelDetails'])->select('id', 'tuition_day', 'tutor_id', 'subject_id', 'attend_class', 'tutor_reject_reason', 'teaching_start_time', 'booking_date', 'user_name as userName', 'level_id', 'email as userEmail', 'created_by as createdBy','main_id')
            ->whereHas('subjectDetails', function ($subjectQuery) {
                $subjectQuery->whereNull('deleted_at');
            })
            ->whereHas('tutorDetails', function ($queryVal) {
                $queryVal->where('status', 'Accepted');
            })
            ->where('inquiry_type', '2')
            ->where('tutor_id', $tutorId)
            ->whereNotNull('user_name')
            ->whereNull('deleted_at')
            ->paginate(10);
        return $query;
    }
    public static function getOfflineBookingDetails($tutorId)
    {
        $query =  ParentDetail::with(['tutorDetails', 'subjectDetails', 'levelDetails'])->select('id', 'tuition_day', 'tutor_id', 'subject_id', 'attend_class', 'tutor_reject_reason', 'teaching_start_time', 'booking_date', 'user_name as userName', 'level_id', 'email as userEmail')
            ->whereHas('subjectDetails', function ($subjectQuery) {
                $subjectQuery->whereNull('deleted_at');
            })
            ->whereHas('tutorDetails', function ($queryVal) {
                $queryVal->where('status', 'Accepted');
            })
            ->where('inquiry_type', '2')
            ->where('id', $tutorId)
            ->whereNotNull('user_name')
            ->whereNull('deleted_at')
            ->first();
        return $query;
    }
    public static function getOfflineBookings($name, $tutorName, $subjectName, $level, $day)
    {
        $query =  ParentDetail::with(['tutorDetails', 'subjectDetails', 'levelDetails'])
            ->whereHas('tutorDetails', function ($queryTutor) use ($tutorName) {
                if ($tutorName != '') {
                    $queryTutor->whereRaw('LOWER(first_name) LIKE "%' . strtolower($tutorName) . '%"');
                }
            })
            ->whereHas('subjectDetails', function ($querySubject) use ($subjectName) {
                if ($subjectName != '') {
                    $querySubject->whereRaw('LOWER(main_title) LIKE "%' . strtolower($subjectName) . '%"');
                }
            })
            ->whereHas('levelDetails', function ($queryLevel) use ($level) {
                if ($level != '') {
                    $queryLevel->whereRaw('LOWER(title) LIKE "%' . strtolower($level) . '%"');
                }
            })
            ->whereRaw('LOWER(tuition_day) LIKE "%' . strtolower($day) . '%"')
            ->whereRaw('LOWER(user_name) LIKE "%' . strtolower($name) . '%"')
            ->whereNotNull('user_name')
            ->whereNull('deleted_at')
            ->where('inquiry_type', "2")
            ->paginate(10);
        return $query;
    }
    public static function getHourlyRate($id)
    {
        $query = ParentDetail::select('id', 'hourly_rate')->where('id', $id)->first();
        return $query;
    }
    public static function getDetailsHourlyRate($subjectId, $levelId, $tutorId, $day, $time)
    {
        $query = ParentDetail::where('subject_id', $subjectId)->where('level_id', $levelId)->where('tutor_id', $tutorId)->where('tuition_day', $day)->where('tuition_time', $time)->get();
        return $query;
    }
    public static function getDetailsHourlyRateExists($subjectId, $levelId, $tutorId)
    {
        $query = ParentDetail::where('subject_id', $subjectId)->where('level_id', $levelId)->where('tutor_id', $tutorId)->whereNotNull('hourly_rate')->first();
        return $query;
    }
    public static function updateHourlyRate($id, $rate)
    {
        $user = Auth()->user();
        $updateArr = array(
            'hourly_rate' => $rate,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user['id']
        );
        $query = ParentDetail::where('id', $id)->update($updateArr);
        return $query;
    }
    public static function updateHourlyRateExists($id, $rate, $subjectinquiry, $level, $tutorId)
    {
        $updateArr = array(
            'hourly_rate' => $rate,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $query = ParentDetail::where('user_id', $id)->where('subject_id', $subjectinquiry)->where('level_id', $level)->where('tutor_id', $tutorId)->update($updateArr);
        return $query;
    }
    public static function getDetailsExists($userId, $subjectId, $levelId, $tutorId, $time, $bookDate)
    {
        $query = ParentDetail::where('subject_id', $subjectId)->where('level_id', $levelId)->where('tutor_id', $tutorId)->where('user_id', $userId)->where('booking_date', $bookDate)->where('tuition_time', $time)->first();
        return $query;
    }
    public static function getInquiryDetails($inquiryId)
    {
        $query = ParentDetail::with(['tutorDetails', 'subjectDetails', 'userDetails', 'levelDetails'])->whereNull('deleted_at')->where('id', $inquiryId)->first();
        return $query;
    }
    public static function updateNotificationFlag($inquiryId)
    {
        $user = Auth()->user();
        $updateArr = array(
            'notification_flag' => 2,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user['id']
        );
        $query = ParentDetail::where('id', $inquiryId)->update($updateArr);
        return $query;
    }
    public static function updateZoomDetails($id, $meetingId, $meetingUrl, $password)
    {
        $user = Auth()->user();
        $updateArr = array(
            'meeting_id' => $meetingId,
            'meeting_password' => $password,
            'meeting_url' => $meetingUrl,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user['id']
        );
        $query = ParentDetail::where('id', $id)->update($updateArr);
        return $query;
    }
    public static function getParentDataById($id)
    {
        $query =  ParentDetail::with('userDetails')->whereHas('userDetails', function ($queryVal) {
            $queryVal->where('status', 'Accepted');
            $queryVal->whereNull('deleted_at');
            $queryVal->orderBy('id', 'desc');
        })
            ->where('id', $id)
            ->groupBy('user_id')
            ->first();
        return $query;
    }
    public static function countOfflineBookings(){
       return ParentDetail::where('inquiry_type','2')->whereNull('deleted_at')->count();
    }
    public static function checkUniqueEntry($subjectName,$level,$bookingDate,$time,$tutorId,$id)
    {
        if($id == ""){
            $query =  ParentDetail::where('tutor_id', $tutorId)->where('subject_id',  $subjectName)->where('level_id', $level)->where('tuition_time', $time)->where('booking_date', $bookingDate)
                ->whereNull('deleted_at')
                ->count();
            return $query;
        }else{
            $query =  ParentDetail::where('tutor_id', $tutorId)->where('subject_id', $subjectName)->where('level_id', $level)->where('tuition_time', $time)->where('booking_date', $bookingDate)->where('id', '!=', $id)
            ->whereNull('deleted_at')
            ->count();
            return $query; 
        }
       
    }
    public static function checkParentBooking($date, $startTime, $endTime, $tutorId){
        $query = ParentDetail::where('booking_date', $date)->whereTime('tuition_time','>=', $startTime)->whereTime('tuition_time','<=', $endTime)->where('tutor_id', $tutorId)->where('inquiry_type',1)->first();
        return $query;
    }
    public static function getDataFromPaymentToken($paymentToken){
        $query = ParentDetail::where('payment_token', $paymentToken)->first();
        return $query;
    }
    public static function fetchSubjectName($id){
        $query = ParentDetail::select('subject_id')->where('subject_id', $id)->with('subjectDetails')->get();
        return $query;
    }
    public static function fetchLevelName($id){
        $query = ParentDetail::select('level_id')->where('level_id', $id)->with('levelDetails')->get();
        return $query;
    }
    public static function getOfflineBookingDate($id){
        $query =  ParentDetail::select('id','main_id','booking_date')
            ->where('main_id', $id)
            ->whereNotNull('user_name')
            ->whereNull('deleted_at')
            ->latest('id')
            ->first();
        return $query;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentDetail extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = 'sc_parent_inquiry_details';
    protected $fillable = ['id', 'user_id', 'subject_id', 'level_id', 'tuition_day', 'tuition_time',  'created_by', 'updated_by', 'deleted_by', 'deleted_at','created_at', 'updated_at', 'tutor_id','payment_link_flag','payment_token','payment_status', 'booking_status','booking_date','hourly_rate','teaching_start_time','teaching_hours','attend_class','tutor_reject_reason','teaching_end_time','inquiry_type','user_name','email','meeting_id','meeting_password','meeting_url','teaching_type','no_of_lessons','main_id'];

    public function userDetails()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function tutorDetails()
    {
        return $this->hasOne(User::class, 'id', 'tutor_id');
    }
    public function subjectDetails()
    {
        return $this->hasOne(SubjectMaster::class, 'id', 'subject_id');
    }
    public function levelDetails()
    {
        return $this->hasOne(TutorLevel::class, 'id', 'level_id');
    }
    public function teachingTypeDetails()
    {
        return $this->hasOne(OnlineTutoring::class, 'id', 'teaching_type');
    }
    public function subSubjectDetails()
    {
        return $this->hasMany(SubjectMaster::class, 'parent_id', 'subject_id');
    }
}

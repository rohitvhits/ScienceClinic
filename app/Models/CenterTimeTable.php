<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CenterTimeTable extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];

    protected $table = 'sc_center_timetable';
    protected $fillable = ['id', 'tutor_id','subject_id','level','month','student', 'available_datetime', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];
}

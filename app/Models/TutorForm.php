<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorForm extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ["id"];

    protected $table = 'sc_tutor_form';
}

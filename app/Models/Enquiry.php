<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ["id"];
    protected $table = 'sc_enquiry';
   protected $fillable = ['id', 'name', 'email','phone','subject','level','deleted_by','deleted_at', 'created_at', 'updated_at'];
   
}

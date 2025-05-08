<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayClaimForm extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ["id"];

    protected $table = 'sc_pay_claim_form';
}

<?php



namespace App\Models;



use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Laravel\Fortify\TwoFactorAuthenticatable;

use Laravel\Jetstream\HasProfilePhoto;

use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable

{

    use HasApiTokens;

    use HasFactory;

    use HasProfilePhoto;

    use Notifiable;

    use TwoFactorAuthenticatable;

    use SoftDeletes;


    /**

     * The attributes that are mass assignable.

     *

     * @var string[]

     */

    protected $guarded = ["id"];

    protected $table = 'users';

    protected $fillable = [

        'first_name',

        'last_name',

        'profile_photo',

        'status',

        'type',

        'email',

        'password',

        'mobile_id',

        'created_by',

        'updated_by',

        'deleted_by ',

        'deleted_at',

        'address1',

        'address2',

        'address3',

        'city',

        'postcode',

        'bio',

        'user_name',
        'otp',
        'title',
        'subject_name'
    ];



    /**

     * The attributes that should be hidden for serialization.

     *

     * @var array

     */

    protected $hidden = [

        'password',

        'remember_token',

        'two_factor_recovery_codes',

        'two_factor_secret',

    ];



    /**

     * The attributes that should be cast.

     *

     * @var array

     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];



    /**

     * The accessors to append to the model's array form.

     *

     * @var array

     */

    protected $appends = [

        'profile_photo_url',

    ];
    public function subjectDetails()
    {
        return $this->belongsTo(TutorSubjectDetail::class, 'id', 'tutor_id');
    }
    public function levelDetails()
    {
        return $this->belongsTo(TutorLevelDetail::class, 'id', 'tutor_id');
    }
    public function userSubjectDetails()
    {
        return $this->hasOne(TutorLevelDetail::class, 'tutor_id', 'id');
    }
}


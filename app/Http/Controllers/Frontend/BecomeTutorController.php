<?php



namespace App\Http\Controllers\Frontend;

use App\Helpers\MailHelper;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Validator;

use App\Http\Traits\ImageUploadTrait;

use App\Helpers\TutorDetailHelper;

use App\Helpers\UserHelper;

use App\Helpers\SubjectHelper;

use App\Helpers\TutorLevelHelper;

use App\Helpers\TutorUniversityDetailHelper;

use App\Helpers\TutorSubjectDetailHelper;

use App\Helpers\TutorLevelDetailHelper;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\all;
use File;
class BecomeTutorController extends Controller

{

    public $successStatus = 200;

    public $validationStatus = 400;

    public $errorStatus = 500;

    public $unauthorizedStatus = 401;

    public $notFoundStatus = 404;

    public $alreadyExistStatus = 409;

    use ImageUploadTrait;

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $data['subject_list'] = SubjectHelper::getAllSubjectList();
        $data['tutor_level_list'] = TutorLevelHelper::getAllTutorList();
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('frontend.become_tutor.create', $data);
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required | max:30',

            'email' => 'required | email',

            'country' => 'required',
            'mobile' => 'required | numeric',

            'address1' => 'required | max:255',

            'address2' => 'required | max:255',

            'address3' => 'required | max:255',

            'city' => 'required | max:20',

            'postcode' => 'required | max:8',

            'bio' => 'required',

            'title' => 'required | max:100',

            'profile_image' => 'required',

            'dbsdisclosure' => 'required',

            'exprienceinuk' => 'required',

            'tutorexperienceinuk' => 'required',

            'paytax' => 'required',

            'user_name' => 'required | max:255',

            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%&*]).{6,}$/',

            'university' => 'required | max:35',

            'qualification' => 'required | max:35',

            'subject_name' => 'required | max:255',
        );
        $messsages = array(
            'password.regex' => 'Password should include 6 charaters, alphabets, numbers and special characters'
        );
        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
        } else {
            $image = '';
            if(!empty($request->crop_image) || $request->crop_image != ''){
                $data = explode(';', $request->crop_image);
                $part = explode("/", $data[0]);
                $image = $request->crop_image;  // your base64 encoded
                $image = str_replace('data:image/'.$part[1].';base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $fileName = time().uniqid() .'.'.$part[1];
                $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/uploads/user/';
                \File::put($_SERVER['DOCUMENT_ROOT'].'/uploads/user/' .$fileName, base64_decode($image));
                chmod($destinationPath.$fileName,0777);
                $image = url('/').'/uploads/user/'.$fileName;
            }

            // if ($request->file('profile_image') != '') {

            //     $image = $this->uploadImageWithCompress($request->file('profile_image'), 'uploads/user');
            // }
            
            $getCC=Country::where('id',$request->country)->first();
            $cc='';
            if($getCC && isset($getCC->phonecode))
            {
                $cc=$getCC->phonecode;
            }
            $data_array = array(

                'first_name' => $request->name,

                'email' => $request->email,

                'country_id' => $request->country,
                'country_code' => $cc,
                'mobile_id' => $request->mobile,

                'address1' => $request->address1,

                'address2' => $request->address2,

                'address3' => $request->address3,

                'city' => $request->city,

                'postcode' => $request->postcode,

                'bio' => $request->bio,

                'title' => $request->title,

                'subject_name' => $request->subject_name,

                'profile_photo' => $image,
                'type' => 2,
                'user_name' => $request->user_name,
                'status' => 'Pending',
                'password' => Hash::make($request->password),
                'center_tutor' => 'no'

            );
            $data = UserHelper::save($data_array);

            if ($data) {

                $document = '';

                if ($request->dbsdisclosure == 'Yes') {



                    if ($request->file('document_pdf') != '') {

                        $document = $this->uploadImageWithCompress($request->file('document_pdf'), 'uploads/user');
                    }
                }

                $tutorDetails = array(

                    'tutor_id' => $data,

                    'dbs_disclosure' => $request->dbsdisclosure,

                    'experience_in_uk' => $request->exprienceinuk,

                    'total_experience_in_uk' => $request->tutorexperienceinuk,

                    'pay_tex' => $request->paytax,

                    'document' => $document

                );

                $detail = TutorDetailHelper::save($tutorDetails);



                $university = $request->input('university');

                if (!empty($university)) {

                    foreach ($university as $key => $val) {

                        $document_image = '';

                        if ($request->file('document_certi') != '') {

                            $document_image = $this->uploadImageWithCompress($request->file('document_certi')[$key], 'uploads/user/certificate');
                        }

                        $tutorUniversityDetails = array(

                            'tutor_id' => $data,

                            'university_name' => $val,

                            'qualification' => $request->input('qualification')[$key],

                            'document_image' => $document_image

                        );



                        $university = TutorUniversityDetailHelper::save($tutorUniversityDetails);
                    }
                }
                $subject = $request->input('main_subject_id');

                if (!empty($subject)) {

                    foreach ($subject as $vals) {

                        $levelArray = $request->input('level' . $vals);
                        foreach ($levelArray as $val) {
                            $subject = $request->input('subject' . $vals);
                            $tutorLevelDetails = array(
                                'tutor_id' => $data,
                                'level_id' => $val,
                                'subject_id' => $request->input('subject' . $vals)[0],
                                'website_flag' => 1
                            );
                            $subject = TutorLevelDetailHelper::save($tutorLevelDetails);
                        }
                    }
                }
                if ($data && $detail && $university && $subject) {
                    $adminData = UserHelper::getAdminData();
                    $email = $adminData->email;
                    $html = '<p>Below are the details of the new tutor</p><br>
                        <p style="margin-bottom: 0px;">Name : <span>' . $request->name . '</span></p>
                        <p style="margin-bottom: 0px;">Email : <span>' . $request->email . '</span></p>
                        <p style="margin-bottom: 0px;">Phone No : <span>' . $request->mobile . '</span></p>
                        <p style="margin-bottom: 0px;">Address1 : <span>' . $request->address1 . '</span></p>
                        <p style="margin-bottom: 0px;">Address2 : <span>' . $request->address2 . '</span></p>
                        <p style="margin-bottom: 0px;">Address3 : <span>' . $request->address3 . '</span></p>
                        <p style="margin-bottom: 0px;">City : <span>' . $request->city . '</span></p>
                        <p style="margin-bottom: 0px;">Postcode : <span>' . $request->postcode . '</span></p>
                        <p style="margin-bottom: 0px;">Bio : <span>' . $request->bio . '</span></p>
                    ';
                    $subject = __('emails.tutor_inquiry');
                    $body = __('emails.tutor_inquiry_body', ['USERNAME' => 'Admin', 'HTMLTABLE' => $html]);
                    $body_email = __('emails.template', ['BODYCONTENT' => $body]);
                    $mail = MailHelper::mail_send($body_email, $email, $subject);
                }
                return response()->json(['error_msg' => trans('messages.addedSuccessfully'), 'data' => $data, 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'data' => $data, 'status' => 0], 200);
            }
        }
    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        //

    }



    public static function checkEmail(Request $request)

    {

        // dd($request->all());

        $email = $request->email;

        $data =  UserHelper::checkDuplicateEmail($email);



        if ($data != 0) {

            return response()->json(['status' => 1]);
        } else {

            return response()->json(['status' => 0]);
        }
    }
}

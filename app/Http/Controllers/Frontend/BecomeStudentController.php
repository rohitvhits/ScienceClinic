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
use App\Models\StudentMaster;
use App\Models\SubjectMaster;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;
use File;
class BecomeStudentController extends Controller
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
        return view('frontend.become_student.create', $data);
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
            'student_name' => 'required | max:30',
            'parent_name' => 'required | max:30',
            'parent_email' => 'required | email',
            'country' => 'required',
            'parent_mobile' => 'required | numeric',
            'parent_address' => 'required | max:255',
            'subject' => 'required | max:255',
            'level' => 'required | max:255',
            'year_group' => 'required | max:255'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
        } else {
            $checkExist=StudentMaster::whereNull('deleted_at')->where([['student_name','=',$request->student_name],['parent_mobile', $request->parent_mobile],['parent_email', $request->parent_email]])->first();
            if(empty($checkExist))
            {
                $getCC=Country::where('id',$request->country)->first();
                $cc='';
                if($getCC && isset($getCC->phonecode))
                {
                    $cc=$getCC->phonecode;
                }
                $data_array = array(
                    'student_name' => $request->student_name,
                    'parent_name' => $request->parent_name,
                    'country_id' => $request->country,
                    'country_code' => $cc,
                    'parent_mobile' => $request->parent_mobile,
                    'parent_email' => $request->parent_email,
                    'parent_address' => $request->parent_address,
                    'subject_id' => $request->subject,
                    'level' => $request->level,
                    'year_group' => $request->year_group
                );
                $insert = new StudentMaster($data_array);
                $data = $insert->save();
                if ($data) {
                    $pid='';
                    $checkEmail=User::whereNull('deleted_at')->where('email', $request->parent_email)->first();
                    if($checkEmail)
                    {
                        $pid=$checkEmail->id;
                    }
                    $checkPhone=User::whereNull('deleted_at')->where('mobile_id', $request->parent_mobile)->first();
                    if($checkPhone)
                    {
                        if($pid!=$checkPhone->id)
                        {
                            $pid='';
                        }
                    }
                    if(empty($pid))
                    {
                        $userArr = array(
                            'first_name' => $request->parent_name,
                            'type' => 3,
                            'email' => $request->parent_email,
                            'country_id' => $request->country,
                            'country_code' => $cc,
                            'mobile_id' => $request->parent_mobile,
                            'address1' => $request->parent_address,
                            'status' => 'Pending'
                        );
                        $userData = UserHelper::save($userArr);
                    }
                    return response()->json(['error_msg' => trans('messages.addedSuccessfully'), 'data' => $data, 'status' => 1], 200);
                } else {
                    return response()->json(['error_msg' => trans('messages.error'), 'data' => $data, 'status' => 0], 200);
                }
            }
            else {
                return response()->json(['error_msg' => trans('messages.error'), 'data' => 'Student alreay registered', 'status' => 2], 200);
                // return response()->json(['error_msg' => trans('messages.error'), 'data' => $data, 'status' => 0], 200);
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

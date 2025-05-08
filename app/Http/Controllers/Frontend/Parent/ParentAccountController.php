<?php

namespace App\Http\Controllers\Frontend\Parent;

use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ParentAccountController extends Controller
{
    public function index()
    {
        $country_list = Country::orderBy('iso','ASC')->get();
        return view('frontend.parent.parent_account', compact('country_list'));
    }
    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $data =  UserHelper::checkDuplicateEmailParent($email);
        if ($data != 0) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function parentUpdate(Request $request)
    {
      
        $userId = Auth()->user()->id;

        $validator = Validator::make($request->all(), [

            'firstname' => 'required|max:30',

            'lastname' => 'required|max:30',

            'email' => 'required|max:30',
            'country' => 'required',
            'telephone' => 'required',
            'address' => 'required',

        ]);
        if ($validator->fails()) {

            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
        } else {
            $getCC=Country::where('id',$request->country)->first();
            $cc='';
            if($getCC && isset($getCC->phonecode))
            {
                $cc=$getCC->phonecode;
            }
            $data = array(
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'email' => $request->email,
                'country_id' => $request->country,
                'country_code' => $cc,
                'mobile_id' => $request->telephone,
                'address1' => $request->address,
            );
          $userData = UserHelper::update($data, array(['id',$userId]));
          if($userData){
            $data['fullname'] = $request->firstname .' '. $request->lastname;

            return response()->json(['error_msg' => "Successfully updated", 'data' => $data], 200);
            }else{
                return response()->json(['error_msg' => "Something went wrong", 'data' => ''], 400);
            }
        }
    }

    public function checkOldPassword(Request $request)
    {

        $pwd = $request->pwd;
        $auth = Auth::guard('parent')->user();
        $password = $auth['password'];
        if (Hash::check($pwd, $password)) {
            return response()->json(['status' => 0]);
        } else {
            return response()->json(['status' => 1]);
        }
    }

    public function updatePassword(Request $request)

    {
        $auth  = auth()->user();
        $rules = array(
            'oldpassword' => 'required',
            'newpassword' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%&*]).{6,}$/',
            'confirmpassword' => 'required|same:newpassword|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%&*]).{6,}$/',
        );
        $messsages = array(
            'newpassword.regex' => 'Password should include 6 charaters, alphabets, numbers and special characters',
            'confirmpassword.regex' => 'Password should include 6 charaters, alphabets, numbers and special characters'
        );
        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 0], 400);
        } else {
            $user_id = $auth['id'];
            $user = User::findOrFail($user_id);

            if ($request->input('newpassword') == $request->input('confirmpassword')) {

                $user->fill([

                    'password' => Hash::make($request->input('newpassword'))

                ])->save();

                return response()->json(['success_msg' => trans('messages.updatedSuccessfully'), 'status' => 1, 'data' => array()], 200);
            } else {
                return response()->json(['error_msg' => trans('messages.errormsg'), 'status' => 0, 'data' => array()], 400);
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Frontend\Tutor;

use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImageUploadTrait;
use File; 
use DB;
use URL;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TutorProfilePhotoController extends Controller
{
    use ImageUploadTrait;
    
    public function index()
    {
        $user = Auth::guard('web')->user();
        $uid = $user['id'];
        $data['uvd'] = User::where('id', $uid)->select('video')->first();
        return view('frontend.tutor.tutor_profile_photo', $data);
    }

    public function updateTutorImage(Request $request)
    {
       
        $image = '';
        // if ($request->file('profile') != '') {
        //     $image = $this->uploadImageWithCompress($request->file('profile'), 'uploads/user');
        // }
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
        $data = UserHelper::updateProfile($image);
        if ($data) {
            return response()->json(['success_msg' => trans('messages.updatedSuccessfully'), "data" => $image], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error'), "data" => ''], 400);
        }
    }

    public function updateTutorVideo(Request $request)
    {
        $image = '';
        if ($request->file('profileVideo') != '')
        {
            $imgName = 'video_'.rand(000000,999999).time().'.'.$request->profileVideo->extension();  
            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/uploads/user/';
            $request->profileVideo->move($destinationPath, $imgName);
            $image = url('/').'/uploads/user/'.$imgName;
        }
        $data = UserHelper::updateVideo($image);
        if ($data) {
            return response()->json(['success_msg' => trans('messages.updatedSuccessfully'), "data" => $image], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error'), "data" => ''], 400);
        }
    }
}

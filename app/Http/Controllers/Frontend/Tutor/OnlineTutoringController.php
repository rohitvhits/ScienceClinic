<?php

namespace App\Http\Controllers\Frontend\Tutor;

use App\Helpers\OnlineTutoringHelper;
use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OnlineTutoringController extends Controller
{
    public function index()
    {
        $tutorId = Auth::user()->id;
        $data['query'] = UserHelper::getMeritHubLink($tutorId);
        return view('frontend.tutor.online-tutoring', $data);
    }

    public function ajaxList(Request $request)
    {
        $tutorId = Auth::user()->id;
        $data['query'] = UserHelper::getMeritHubLink($tutorId);
        return view('frontend.tutor.online-tutoring-ajax', $data);
    }

    public function addMeritHublink(Request $request)
    {
        $rules = array(
            'link' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error_msg' => $validator->errors(), 'status' => 0], 400);
        } else {
            $tutorId = Auth::user()->id;
            $dataArray = array('merithub_link' => $request->link);
            $update = UserHelper::update($dataArray, array('id' => $tutorId));
            if ($update) {
                return response()->json(['error_msg' => 'Successfully Inserted', 'data' => $update, 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'data' => array(), 'status' => 0], 500);
            }
        }
    }
    public function editMeritHublink(Request $request)
    {
        if ($request->id != "") {
            $tutorId = Auth::user()->id;
            $data = UserHelper::getMeritHubLink($tutorId);
            if ($data) {
                return response()->json(['data' => $data, 'status' => 1], 200);
            } else {
                return response()->json(['data' => array(), 'status' => 0], 500);
            }
        }
    }
    public function updateMeritHublink(Request $request)
    {
 
        $rules = array(
            'link' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error_msg' => $validator->errors(), 'status' => 0], 400);
        } else {
            $tutorId = Auth::user()->id;
            $dataArray = array('merithub_link' => $request->link);
            $update = UserHelper::update($dataArray, array('id' => $tutorId));
            if ($update) {
                return response()->json(['error_msg' => 'Successfully Inserted', 'data' => $update, 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'data' => array(), 'status' => 0], 500);
            }
        }
    }
    public function deleteMeritHublink(Request $request)
    {
        if ($request->id == "") {
        } else {
            $tutorId = Auth::user()->id;
            $dataArray = array('merithub_link' => null);
            $update = UserHelper::update($dataArray, array('id' => $tutorId));
            if ($update) {
                return response()->json(['error_msg' => 'Successfully Deleted', 'data' => $update, 'status' => 1], 200);
            } else {
                return response()->json(['error_msg' => trans('messages.error'), 'data' => array(), 'status' => 0], 500);
            }
        }
    }

}

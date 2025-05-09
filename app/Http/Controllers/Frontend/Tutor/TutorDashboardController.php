<?php



namespace App\Http\Controllers\Frontend\Tutor;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TutorDashboardController extends Controller

{

    public function index(){

        return view('frontend.tutor.tutor-dashboard');

    }

    public function dbs(){
        return view('frontend.tutor.tutor-dbs');
    }

    public function dbsUpdate(Request $request)
    {
        $dbsArr = array(
            'valid_dbs' => $request->dbs
        );
        if ($request->dbsFile) 
        {
            $file = $request->dbsFile;
            $imgName = 'dbs'.uniqid().'.'.$file->extension();
            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/uploads/dbs/';
            $file->move($destinationPath, $imgName);
            $dbsArr['dbs_file']=$imgName;
        }
        if(!empty($request->dbsNumber))
        {
            $dbsArr['dbs_application_no']=$request->dbsNumber;
        }
        $auth = Auth::guard()->user();
        $update = UserHelper::update($dbsArr,array('id' => $auth->id));
        if ($update) {
            return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), "data" => $dbsArr, 'status' => '1'], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error'), "data" => '', 'status' => '0'], 400);
        }
    }

    public function changeValidDbs(Request $request)
    {
        $auth = Auth::guard()->user();
        $dbsArr = array(
            'valid_dbs' => $request->dbs
        );
        $update = UserHelper::update($dbsArr,array('id' => $auth->id));
        if ($update) {
            return response()->json(['error_msg' => trans('messages.updatedSuccessfully'), "data" => $dbsArr, 'status' => '1'], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error'), "data" => '', 'status' => '0'], 400);
        }
    }

}
<?php

namespace App\Http\Controllers\Frontend\Parent;

use App\Helpers\TutorResourcesHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentELearningController extends Controller
{
    public function index()
    {
        return view('frontend.parent.parent-e-learning');
    }
    public function ajaxList(Request $request){
        $auth = auth()->user();
        $userStatus = $auth['status'];
        $data['page'] = $request->input('page');
        $data['query'] = '';
        if($userStatus == "Accepted"){
            $data['query'] = TutorResourcesHelper::getListwithELearningData();
        }
        return view('frontend.parent.parent-e-learning-ajax-list',$data);
    }
}

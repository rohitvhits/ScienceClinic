<?php

namespace App\Http\Controllers\Frontend\Tutor;

use App\Helpers\FeedbackHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TutorReview;

class TutorFeedBackController extends Controller
{
    public function index()
    {
        return view('frontend.tutor.tutor-feedback');
    }
    public function ajaxList(Request $request)
    {
        $auth = Auth::guard('web')->user();
        $id = $auth['id'];
        $data['page'] = $request->page;
        $data['query'] = FeedbackHelper::getListFeedbackWithPaginate($id);

        $data['query2'] = TutorReview::leftjoin('sc_subject_master','sc_subject_master.id','=','sc_tutor_reviews.subject_id')->where([['sc_tutor_reviews.tutor_id','=',$id],['sc_tutor_reviews.status','=','active']])->select(['sc_tutor_reviews.*','sc_subject_master.main_title as subject_name'])->paginate(10);
        
        return view('frontend.tutor.tutor-feedback-ajax', $data);
    }
}

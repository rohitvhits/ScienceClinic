<?php



namespace App\Http\Controllers\Frontend;

use App\Helpers\PastPapersDetailHelper;
use App\Helpers\PastPapersHelper;
use App\Helpers\TextBooksHelper;
use App\Helpers\TutorResourcesHelper;
use App\Helpers\UserHelper;
use App\Helpers\SubjectHelper;
use App\Helpers\TutorLevelHelper;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\PastPapersCategory;
use App\Models\User;
use App\Models\Country;
use App\Models\Enquiry;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller

{

    public function index(){
        $data['subject_list'] = SubjectHelper::getAllSubjectList();
        foreach ($data['subject_list'] as $val) {
            $val->url = URL::to('/') . '/find-tutor/' . rtrim(strtr(base64_encode($val->id), '+/', '-_'), '=');
        }
        $data['allTutors'] = UserHelper::getAllTutors();
        $data['allLevelData'] = TutorLevelHelper::getAllTutorList();
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('frontend.home.home_test',$data);
    }
    public function index_test(){
        $data['subject_list'] = SubjectHelper::getAllSubjectList();
        foreach ($data['subject_list'] as $val) {
            $val->url = URL::to('/') . '/find-tutor/' . rtrim(strtr(base64_encode($val->id), '+/', '-_'), '=');
        }
        $data['allTutors'] = UserHelper::getAllTutors();
        $data['allLevelData'] = TutorLevelHelper::getAllTutorList();
        $data['country_list'] = Country::orderBy('iso','ASC')->get();
        return view('frontend.home.newDesign',$data);
    }

    public function saveInquiry(Request $request)
    {
        $rules = array(
            'full_name' => 'required|max:30',
            'email' => 'required|email|max:30',
            'country' => 'required',
            'phone' => 'required|max:12',
            'subject' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error_msg' => $validator->errors(), 'status' => 0], 400);
        } else {
            $add=new Enquiry();
            $add->name=$request->full_name;
            $add->email=$request->email;
            $add->country=$request->country;
            $add->phone=$request->phone;
            $add->subject=$request->subject;
            $add->level=$request->level;
            $add->created_at=date('Y-m-d H:i:s');
            $saved=$add->save();
            if($saved)
            {
                return response()->json(['error_msg' => "Successfully instered", 'status' => 1], 200);
            }
            else
            {
                return response()->json(['error_msg' => 'Failed to insert', 'status' => 0], 400);
            }
        }
    }
    public function terms_conditions(){
        return view('frontend.terms_condition');
    }

    public function getELearningdata(Request $request){
        $data['getElearning'] = TutorResourcesHelper::getListwithPaginateAdminAll();
        return view('frontend.home.e_learning',$data);
    }
    
    public function getPastPaperData(Request $request){

        $dataGetcategory = PastPapersHelper::getAllcategory();
        $mainArray = array();
        if(count($dataGetcategory) > 0){
            foreach($dataGetcategory as $key){
                $getGetPaperData = PastPapersHelper::getDatabyCategory($key->id);
                $paperDetail = array();
                if(count($getGetPaperData) > 0){
                    foreach($getGetPaperData as $gkey){

                        $getSubjectDataByPaper = PastPapersHelper::getSubejctData($gkey->id,$gkey->paper_category_id);
                        $subjectArray = array();
                        if(count($getSubjectDataByPaper) > 0){
                            foreach($getSubjectDataByPaper as $skey){
                                $subjectArray[] = $skey;
                            }
                        }
                        $gkey->subjectData = $subjectArray;
                        $paperDetail[] = $gkey;
                    }
                }
                $key->paperArray = $paperDetail;
                if(count($paperDetail) > 0){
                    $mainArray[] = $key;
                }
                
            }
        }
        
        $data['paperData'] = $mainArray;
        return view('frontend.home.pas_papaer_resource',$data);
    }
    public function getPastPaperDetailData(Request $request,$id){
        $pastPaperdata = PastPapersHelper::getAlldataByPaperID($id);
        $mainArray = array();
        if(count($pastPaperdata) > 0){
            foreach($pastPaperdata as $key){
                $getPaperschmedata = PastPapersDetailHelper::getAlldataByPaperSchemaID($id);
                $detailArray = array();
                if(count($getPaperschmedata) > 0){
                    foreach($getPaperschmedata as $skey){
                        $detailArray[] = $skey;
                    }
                }
                $key->downloadScheme = $detailArray;
                $mainArray[] = $key;
            }
        }
        
        $data['pastPaperdetail']  = $mainArray;
        return view('frontend.home.pas_papaer_resource_detail',$data);
    }

    public function onlineTutoring(){
        return view('frontend.home.online_tutoring');
    }
    public function getTextBook(){
        $data['getTextBook'] = TextBooksHelper::getListwithPaginateAdminAll();
        return view('frontend.home.text_book', $data);
    }

}


<?php



namespace App\Helpers;

use App\Models\TutorDetail;
use App\Models\TutorLevel;
use URL;

use App\Models\TutorLevelDetail;





class TutorLevelDetailHelper

{

    public static function save($data)

    {

        $userId = Auth()->user();

        $data['created_at'] = date('Y-m-d H:i:s');

        if ($userId) {

            $data['created_by'] = $userId['id'];

        }

        $insert = new TutorLevelDetail($data);

        $insert->save();

        $insertId = $insert->id;

        return $insertId;

    }

    public static function update($data, $where)

    {

        $userId = Auth()->user();

        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($userId) {

            $data['updated_by'] = $userId['id'];

        }

        $update = TutorLevelDetail::where($where)->update($data);

        return $update;

    }

    public static function SoftDelete($data, $where)

    {

        $userId = Auth()->user();

        $data['deleted_at'] = date('Y-m-d H:i:s');

        $data['deleted_by'] = $userId['id'];

        $update = TutorLevelDetail::where($where)->update($data);

        return $update;

    }

    public static function getListwithPaginate($id){

     
        $query = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.main_title,GROUP_CONCAT(level.title) as level_name')->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })->where('sc_tutor_level_details.tutor_id',$id)->groupBy('sb.id')->paginate(10);
        

        return $query;

    }

    public static function getSearchUserId($search,$level,$postCode)

    {


        $query = TutorLevelDetail::select('sc_tutor_level_details.tutor_id')->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })->leftjoin('users', function ($join) {
            $join->on('users.id', '=', 'sc_tutor_level_details.tutor_id');
        });
        if($search !=''){
            $query->whereRaw('LOWER(sb.main_title) LIKE "%'.strtolower($search).'%"');
        }
        if ($level != '') {
            $query->whereRaw('LOWER(level.title) LIKE "%' . strtolower($level) . '%"');
        }
        if ($postCode != '') {
            $query->whereRaw('LOWER(users.postcode) LIKE "%' . strtolower($postCode) . '%"');
        }
        $query = $query->groupBy('sc_tutor_level_details.tutor_id')->get();
        return $query;
        

    }
    public static function getTutorLevelDetails($id)
    {
        $query = TutorLevelDetail::select('sc_tutor_level_details.*','sb.main_title')->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->whereRaw('sha1(sc_tutor_level_details.tutor_id)="' . $id . '"')->whereNull('sc_tutor_level_details.deleted_at')->groupBy('sc_tutor_level_details.subject_id')->orderBy('sb.main_title', 'asc')->get();
        return $query;
       

    }

    public static function getAllLevelDetials($subjectId ,$id){
        $query = TutorLevelDetail::select('level.title')->leftjoin('sc_tutor_level as level',function($join){
            $join->on('level.id','=', 'sc_tutor_level_details.level_id');
            
        })->whereRaw('sc_tutor_level_details.subject_id="' . $subjectId . '"')
        ->whereRaw('sha1(sc_tutor_level_details.tutor_id)="' . $id . '"')
        ->get();
        
        return $query;
    }

    public static function getListTutor($id){
        $query = TutorLevelDetail::where('tutor_id',$id)->get();
        return $query;
    }

    public static function getListTutorWithPaginate($id){
        $query = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.id as subjectId,level.id as levelId,sb.main_title,GROUP_CONCAT(level.title) as level_name,level.title')
        ->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })
        ->where('sc_tutor_level_details.tutor_id',$id)
        ->where('sc_tutor_level_details.website_flag',0)
        ->whereNull('sb.deleted_at')
        ->groupBy('sc_tutor_level_details.subject_id')
        ->orderBy('sc_tutor_level_details.id','DESC');
        $query = $query->paginate(10);
        return $query;
    }
    public static function getListOnlineSubjectWithPaginate($id){
        $query = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.id as subjectId,level.id as levelId,sb.main_title,GROUP_CONCAT(level.title) as level_name,level.title')
        ->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })
        ->where('sc_tutor_level_details.tutor_id',$id)
        ->where('sc_tutor_level_details.website_flag',1)
        ->whereNull('sb.deleted_at')
        ->groupBy('sc_tutor_level_details.subject_id')
        ->orderBy('sc_tutor_level_details.id','DESC');
        $query = $query->paginate(10);
        return $query;
    }
    public static function getData($id, $userId){
        $query = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.id as subjectId,level.id as levelId,sb.main_title,GROUP_CONCAT(sc_tutor_level_details.level_id) as level_name,level.title')
        ->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })
        ->where('sc_tutor_level_details.subject_id',$id)
        ->where('sc_tutor_level_details.tutor_id',$userId)
        ->whereNull('sb.deleted_at')
        ->groupBy('sc_tutor_level_details.subject_id')
        ->where('sc_tutor_level_details.website_flag',0)
        ->first();
        return $query;
    }
    public static function getOnlineSubjectData($id, $userId){
        $query = TutorLevelDetail::selectRaw('sc_tutor_level_details.*,sb.id as subjectId,level.id as levelId,sb.main_title,GROUP_CONCAT(sc_tutor_level_details.level_id) as level_name,level.title')
        ->leftjoin('sc_subject_master as sb', function ($join) {
            $join->on('sb.id', '=', 'sc_tutor_level_details.subject_id');
        })->leftjoin('sc_tutor_level as level', function ($join) {
            $join->on('level.id', '=', 'sc_tutor_level_details.level_id');
        })
        ->where('sc_tutor_level_details.subject_id',$id)
        ->where('sc_tutor_level_details.tutor_id',$userId)
        ->whereNull('sb.deleted_at')
        ->groupBy('sc_tutor_level_details.subject_id')
        ->where('sc_tutor_level_details.website_flag',1)
        ->first();
        return $query;
    }
    public static function checkData($subjectId, $levelId, $tutorId, $mainId){
        $query = TutorLevelDetail::whereIn('level_id', $levelId)->where('tutor_id', $tutorId)->where('id','!=',$mainId)->whereNull('deleted_at')->first();
        return $query;
    }
    public static function updateSubject($mainId, $data){
        $update = TutorLevelDetail::where('id', $mainId)->update($data);
        return $update;
    }
    public static function getDetailsById($id)
    {
        $query = TutorLevelDetail::where('tutor_id',$id)->count();
        return $query;
    }
    public static function getDetailsHourlyRateById($id)
    {
        $query = TutorLevelDetail::where('tutor_id',$id)->whereNull('hourly_rate')->count();
        return $query;
    }
    public static function saveHourlyRate($id, $rate, $subjectId)
    {
        $arrData = array(
            'hourly_rate' => $rate
        );
        $query = TutorLevelDetail::where('tutor_id', $id)->where('subject_id', $subjectId)->update($arrData);
        return $query;
    }
    public static function deleteLevelData($id, $subjectId){
        $query = TutorLevelDetail::where('tutor_id', $id)->where('subject_id', $subjectId)->delete(); 
        return $query;
    }
}


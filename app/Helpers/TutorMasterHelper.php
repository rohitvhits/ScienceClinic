<?php
namespace App\Helpers;

use URL;
use App\Models\User;

class TutorMasterHelper
{
    public static function getListwithPaginate($first_name,$email,$mobile,$status,$subject,$created_date){

        $query = User::where('type',2)->withTrashed();
        if($first_name !=''){
            $query->where('first_name','LIKE','%'.$first_name.'%');
        }
        if($email !=''){
            $query->where('email','LIKE','%'.$email.'%');
        }
        if($mobile !=''){
            $query->where('mobile_id','LIKE','%'.$mobile.'%');
        }
        if ($status != '') {

            $query->where('status', 'LIKE', '%' . $status . '%');
        }
        if($created_date !=''){
            $explode = explode('-',$created_date);
            $query->whereDate('created_at','>=',date('Y-m-d',strtotime($explode[0])))->whereDate('created_at','<=',date('Y-m-d',strtotime($explode[1])));
        }
        if ($subject != '') {

            $query->whereHas('userSubjectDetails', function($q) use ($subject){
                $q->where('subject_id', $subject);
            });
        }
        $query = $query->orderBy('id','desc')->paginate(10);
        return $query;
    }
    public static function SoftDelete($data, $where)
    {
        $userId = Auth()->user();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $userId['id'];
        $update = User::where($where)->update($data);
        return $update;
    }
    public static function getDetailsById($id){
        $query = User::where('id',$id)->withTrashed()->first();
        return $query;
    }
    public static function restoreUser($id){
        $query = User::onlyTrashed()->where('id', $id)->restore();
        return $query;
    }
}
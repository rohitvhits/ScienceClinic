<?php



namespace App\Helpers;



use URL;

use App\Models\SubjectMaster;
use App\Models\TextBooks;
use DB;



class TextBooksHelper

{

    public static function save($data)

    {

        $userId = Auth()->user();

        $data['created_at'] = date('Y-m-d H:i:s');

        if ($userId) {

            $data['created_by'] = $userId['id'];
        }

        $insert = new TextBooks($data);

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

        $update = TextBooks::where($where)->update($data);

        return $update;
    }

    public static function SoftDelete($data, $where)

    {

        $userId = Auth()->user();

        $data['deleted_at'] = date('Y-m-d H:i:s');

        $data['deleted_by'] = $userId['id'];

        $update = TextBooks::where($where)->update($data);



        return $update;
    }

    public static function getListwithPaginate($title, $created_date)
    {

        $query = TextBooks::whereNull('deleted_at');

        if ($title != "") {

            $query->where('text_book_title', 'LIKE', '%' . $title . '%');
        }

        if ($created_date != "") {

            $explode = explode('-', $created_date);

            $query->whereDate('created_at', '>=', date('Y-m-d', strtotime($explode[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime($explode[1])));
        }
        $query = $query->orderBy('id', 'DESC')->paginate(10);
        return $query;
    }
    public static function getListwithPaginateId($userId, $title, $created_date)
    {

        $query = TextBooks::whereNull('deleted_at');

        if ($title != "") {

            $query->where('text_book_title', 'LIKE', '%' . $title . '%');
        }

        if ($created_date != "") {

            $explode = explode('-', $created_date);

            $query->whereDate('created_at', '>=', date('Y-m-d', strtotime($explode[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime($explode[1])));
        }
        $query = $query->with('userDetails')->paginate(10);
        return $query;
    }
    public static function getAllTextBooks()
    {
        $query = TextBooks::whereNull('deleted_at')->get();
        return $query;
    }
    public static function getListwithPaginateParentTextBook($getParentInquiry, $id)
    {
        $query = TextBooks::whereNull('deleted_at');
        if($id != ""){
            $query->where('subject_id', $id);
        }
        $query = $query->get();
        return $query;
    }
    public static function getDetailsByid($id)
    {
        $query = TextBooks::where('id', $id)->first();
        return $query;
    }
    public static function getAllsubject()
    {
        return SubjectMaster::whereNull('deleted_at')->get();
    }
    public static function checkTitle($title,$subject,$id)
    {
        if($id !=""){
            return TextBooks::where('text_book_title', $title)->where('subject_id', $subject)->where('id','!=',$id)->count();
        }else{
            return TextBooks::where('text_book_title', $title)->where('subject_id', $subject)->count();
        }
        
    }
    public static function getListwithPaginateAdminAll(){
        $query = TextBooks::whereNull('deleted_at')->get();
        return $query;
    }
}

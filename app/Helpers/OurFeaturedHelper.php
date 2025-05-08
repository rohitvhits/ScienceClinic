<?php

namespace App\Helpers;

use URL;
use App\Models\OurFeatured;

class OurFeaturedHelper
{
    public static function save($data)
    {
        $userId = Auth()->user();
        $data['created_at'] = date('Y-m-d H:i:s');
        if ($userId) {
            $data['created_by'] = $userId['id'];
        }
        $insert = new OurFeatured($data);
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
        $update = OurFeatured::where($where)->update($data);
        return $update;
    }
    public static function SoftDelete($data, $where)
    {
        $userId = Auth()->user();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $userId['id'];
        $update = OurFeatured::where($where)->update($data);
        return $update;
    }
    public static function getListwithPaginate($title,$created_date){
        $query = OurFeatured::orderBy('id','desc');
        if($title !=''){
            $query->where('title','LIKE','%'.$title.'%');
        }

        if($created_date !=''){
            $explode = explode('-',$created_date);
            $query->whereDate('created_at','>=',date('Y-m-d',strtotime($explode[0])))->whereDate('created_at','<=',date('Y-m-d',strtotime($explode[1])));
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getList(){
        $query = OurFeatured::where('id')->get();
        return $query;
    }
    public static function getDetailsById($id){
        $query = OurFeatured::where('id',$id)->first();
        return $query;
    }

    public static function getOurFeaturedList(){
        $query = OurFeatured::orderBy('id','desc')->get();
        return $query;
    }
}

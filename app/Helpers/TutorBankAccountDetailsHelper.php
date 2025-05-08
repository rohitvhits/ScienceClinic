<?php



namespace App\Helpers;

use App\Models\TutorBankAccountDetails;
use Illuminate\Support\Facades\Auth;

class TutorBankAccountDetailsHelper

{
    public static function save($data)

    {

        $userId = Auth()->user();

        $data['created_at'] = date('Y-m-d H:i:s');

        if ($userId) {

            $data['created_by'] = $userId['id'];
        }

        $insert = new TutorBankAccountDetails($data);

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

        $update = TutorBankAccountDetails::where($where)->update($data);

        return $update;
    }

    public static function getTutors($id)
    {
       return TutorBankAccountDetails::where('tutor_id',$id)->first();
    }
    public static function getListWithPaginate($holderName,$bankName,$bankAcNo,$bankCode){
        $query = TutorBankAccountDetails::with('userDetails');
        if($holderName !=''){
            $query->where('account_holder_name',$holderName);
        }
        if($bankName !=''){
            $query->where('bank_name',$bankName);
        }
        if($bankAcNo !=''){
            $query->where('bank_account_number',$bankAcNo);
        }
        if($bankCode !=''){
            $query->where('bank_sort_code',$bankCode);
        }
        $query = $query->orderBy('id','desc')->paginate(10);
        return $query;
    }
}
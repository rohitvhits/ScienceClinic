<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TutorBankAccountDetailsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorBankDetailsController extends Controller
{
    public function index(){
        return view('admin.tutor-bank-details.bank-details');
    }
    public function bankDetailsAjax(Request $request){
        $data['page'] = $request->page;
        $holderName = $request->holderName;
        $bankName = $request->bankName;
        $bankAcNo = $request->bankAcNo;
        $bankCode = $request->bankCode;
        $data['query'] = TutorBankAccountDetailsHelper::getListWithPaginate($holderName,$bankName,$bankAcNo,$bankCode);
        return view('admin.tutor-bank-details.bank-details-ajax',$data);
    }
}

<?php

namespace App\Http\Controllers\Frontend\Parent;

use App\Helpers\ParentDetailHelper;
use App\Helpers\TextBooksHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class ParentTextBooksController extends Controller
{
    public function index(Request $reques)
    {
        return view('frontend.parent.parent_text_books');
    }


    public function paginate($items, $perPage = 10, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }


    public function ajaxList(Request $request)
    {

        $data['page'] = $request->page;
        $auth = auth()->user();
        $userId = $auth['id'];
        if ($request->input('page')) {
            $this->data['page'] = $request->input('page');
        } else {
            $this->data['page'] = 1;
        }
        $getParentInquiry = ParentDetailHelper::getAllInquiry($userId);
        $getParentSubjectInquiry = ParentDetailHelper::getSubjectInquiry($userId);
        $mainArray = array();
        if(count($getParentInquiry) > 0){
            if (count($getParentSubjectInquiry) > 0) {
                $id='';
                foreach($getParentSubjectInquiry as $key){
                    $mainTextBookdata = TextBooksHelper::getListwithPaginateParentTextBook($getParentInquiry,$request->title, $request->created_date, $key->subject_id);
                    foreach($mainTextBookdata as $mainBookData){
                        $mainSubjectId = $mainBookData->subject_id;
                        if($mainBookData->type == "tutor"){
                            if (in_array($mainBookData->tutor_id, $getParentInquiry)) {
                                if ($mainSubjectId == $key->subject_id) {
                                    $mainArray[] = $mainBookData;
                                }
                            }
                        }
                        else if($mainBookData->type == "admin"){
                            if ($mainSubjectId == $key->subject_id) {
                                $mainArray[] = $mainBookData;
                            }
                        }
                    }
                    if(count($key->subSubjectDetails)>0){
                        foreach($key->subSubjectDetails as $val){
                            $id = $val->id;
                            $textBookdata = TextBooksHelper::getListwithPaginateParentTextBook($getParentInquiry,$request->title, $request->created_date, $id);
                            foreach($textBookdata as $bookData){
                                $subjectId = $bookData->subject_id;
                                if($bookData->type == "tutor"){
                                    if (in_array($bookData->tutor_id, $getParentInquiry)) {
                                        if ($subjectId == $id) {
                                            $mainArray[] = $bookData;
                                        }
                                    }
                                }
                                else if($bookData->type == "admin"){
                                    if ($subjectId == $id) {
                                        $mainArray[] = $bookData;
                                    }
                                }
                            }
                        }
                    }  
                }
            }
        }
        $this->data['query'] = $mainArray;
        $paginatinData = $this->paginate($mainArray);
        $this->data['data'] = $paginatinData->withPath('parent-text-books');
        return view('frontend.parent.parent_text_books_ajax', $this->data);
    }
}

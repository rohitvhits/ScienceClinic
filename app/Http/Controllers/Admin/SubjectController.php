<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SubjectHelper;
use App\Helpers\SubjectOtherSectionMasterHelper;
use App\Helpers\SubjectBannerHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImageUploadTrait;
use Validator;
use Session;

class SubjectController extends Controller
{
    use ImageUploadTrait;
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.subject.subject');
    }
    public function ajaxList(Request $request)
    {
        $data['page'] = $request->input('page');
        $created_date = $request->input('created_date');
        $title = $request->input('title');
        $data['query'] = SubjectHelper::getListwithPaginate($title, $created_date);
        return view('admin.subject.subject_ajax_list', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = auth()->user();
        if (empty($auth)) {
            return redirect('/login');
        }
        return view('admin.subject.addsubject');
    }
    public function subjectUnique(Request $request)
    {
        $data =  SubjectHelper::checkDuplicateTitle($request->title);
        if ($data != 0) {

            return response()->json(['status' => 1]);
        } else {

            return response()->json(['status' => 0]);
        }
    }
    public function editSubjectUnique(Request $request)
    {
        $data =  SubjectHelper::checkEditDuplicateTitle($request->title, $request->id);
        if ($data != 0) {
            return response()->json(['status' => 1]);
        } else {

            return response()->json(['status' => 0]);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:100 | unique:sc_subject_master,main_title',
            /*'sub_title' => 'required',
            'sub_title_two' => 'required',
            'link_more' => 'required',
            'section_one_title_more' => 'max:255',
            'title_section_one' => 'required | max:255',
            'subject_description' => 'required',
            'title_section_two' => 'required',
            'description_section_two' => 'required',
            'subject_image' => 'required'*/
        ]);
        if ($validator->fails()) {
            return response()->json(['error_msg' => $validator->errors()->all(), 'status' => 'inactive', 'data' => array()], 200);
            /*
            return redirect("/subject-master/create")
                ->withErrors($validator, 'useredit')
                ->withInput();*/
        } else {
            $data_array = array(
                'main_title' => $request->input('title')
            );
            /*,
            $simagesEnglish = '';
            if ($request->file('subject_image') != '') {
                $simagesEnglish = $this->uploadImageWithCompress($request->file('subject_image'), 'uploads/subject');
            }
            'sub_title_one' => $request->input('sub_title'),
            'sub_title_two' => $request->input('sub_title_two'),
            'title' => $request->input('title_section_one'),
            'description' => $request->input('subject_description'),
            if ($simagesEnglish != '') {
                $data_array['image'] = $simagesEnglish;
            }
            */
            $update = SubjectHelper::save($data_array);
            if ($update) {
                /*
                $section_one_title_more = $request->input('section_one_title_more');
                if (!empty($section_one_title_more[0])) {
                    foreach ($section_one_title_more as $key => $val) {
                        if ($val != "" || $request->input('link_more')[$key] != "") {
                            $titleBanned = array(
                                'subject_id' => $update,
                                'title' => $val,
                                'link' => $request->input('link_more')[$key]
                            );

                            SubjectBannerHelper::save($titleBanned);
                        }
                    }
                }

                $title_section_two = $request->input('title_section_two');
                if (!empty($title_section_two[0])) {
                    foreach ($title_section_two as $key => $val) {
                        $titleBanned = array(
                            'subject_id' => $update,
                            'title' => $val,
                            'description' => $request->input('description_section_two')[$key]
                        );

                        SubjectOtherSectionMasterHelper::save($titleBanned);
                    }
                }
                */
                return response()->json(['error_msg' =>trans('messages.addedSuccessfully'), 'status' => 'active', 'data' => array()], 200);
                /*Session::flash('success', trans('messages.addedSuccessfully'));
                return redirect('/subject-master');*/
            } else {
                return response()->json(['error_msg' =>trans('messages.error'), 'status' => 'inactive', 'data' => array()], 200);
                /*Session::flash('error', trans('messages.error'));
                return redirect('/subject-master/create');*/
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth = auth()->user();
        if (empty($auth)) {
            return redirect('/login');
        }
        $query = SubjectHelper::getDetailsByid($id);
        return response()->json(['error_msg' =>trans('messages.updatedSuccessfully'), 'data' => array($query)], 200);
        /*
        $data['bannerSection'] = SubjectBannerHelper::getDetailsBySubjectId($id);
        $data['SectionTwo'] = SubjectOtherSectionMasterHelper::getDetailsBySubjectId($id);
        return view('admin.subject.edit_subject', $data);
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:100 | unique:sc_subject_master,main_title,' . $request->input('id'),
            /*'sub_title' => 'required',
            'sub_title_two' => 'required',
            'link_more' => 'required',
            'section_one_title_more' => 'max:255',
            'title_section_one' => 'required | max:255',
            'subject_description' => 'required',
            'title_section_two' => 'required',
            'description_section_two' => 'required',*/
        ]);
        if ($validator->fails()) {
            return response()->json(['error_msg' => $validator->errors()->all(), 'status' => 'inactive', 'data' => array()], 400);
            /*return redirect("/subject-master/" . $request->input('id') . '/edit')
                ->withErrors($validator, 'useredit')
                ->withInput();*/
        } else {
            /*
            $simagesEnglish = '';
            if ($request->file('subject_image') != '') {
                $simagesEnglish = $this->uploadImageWithCompress($request->file('subject_image'), 'uploads/subject');
            }
            $data_array = array(
                'main_title' => $request->input('title'),
                'sub_title_one' => $request->input('sub_title'),
                'sub_title_two' => $request->input('sub_title_two'),
                'title' => $request->input('title_section_one'),
                'description' => $request->input('subject_description'),
            );
            if ($simagesEnglish != '') {
                $data_array['image'] = $simagesEnglish;
            }
            */
            $data_array = array('main_title' => $request->input('title'));
            $update = SubjectHelper::update($data_array, array('id' => $request->input('id')));
            /*
            $section_one_title_more = $request->input('section_one_title_more');
            if (!empty($section_one_title_more[0])) {
                SubjectBannerHelper::SoftDelete(array('subject_id' => $request->input('id')));
                foreach ($section_one_title_more as $key => $val) {
                    if ($val != "" || $request->input('link_more')[$key] != "") {

                        $titleBanned = array(
                            'subject_id' => $request->input('id'),
                            'title' => $val,
                            'link' => $request->input('link_more')[$key]
                        );

                        SubjectBannerHelper::save($titleBanned);
                    }
                }
            }

            $title_section_two = $request->input('title_section_two');
            if (!empty($title_section_two[0])) {
                SubjectOtherSectionMasterHelper::SoftDelete(array(), array('subject_id' => $request->input('id')));
                foreach ($title_section_two as $key => $val) {
                    $titleBanned = array(
                        'subject_id' => $request->input('id'),
                        'title' => $val,
                        'description' => $request->input('description_section_two')[$key]
                    );

                    SubjectOtherSectionMasterHelper::save($titleBanned);
                }
            }
            Session::flash('success', trans('messages.updatedSuccessfully'));
            return redirect('/subject-master');
            */
            $query = SubjectHelper::getDetailsByid($request->input('id'));
            return response()->json(['error_msg' =>trans('messages.updatedSuccessfully'), 'status' => 'active', 'data' => array($query)], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $update = SubjectHelper::SoftDelete(array(), array('id' => $id));

        if ($update) {
            return response()->json(['error_msg' => trans('messages.deletedSuccessfully'), 'data' => array()], 200);
        } else {
            return response()->json(['error_msg' => trans('messages.error_msg'), 'data' => array()], 500);
        }
    }
}

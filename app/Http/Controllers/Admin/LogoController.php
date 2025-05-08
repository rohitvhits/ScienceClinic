<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\LogoMasterHelper;
use App\Http\Traits\ImageUploadTrait;
use Validator;
use Session;

class LogoController extends Controller
{
    use ImageUploadTrait;
    public $successStatus =200;

    public function index()
    {

      return view('admin.logo.index');
    }
    public function ajaxList(Request $request){
        $data['page'] = $request->page;
        $title = "";
        $created_date = $request->created_date;
        $data['query'] = LogoMasterHelper::getListwithPaginate($title,$created_date);
        return view('admin.logo.logo_ajax',$data);
     }

    public function create()
    {
        $auth = auth()->user();
        if(empty($auth)){
            return redirect('/login');
        }
        return view('admin.logo.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,bmp,tiff',
            'link' => 'required'
         ]);

         $image = '';
            if ($request->file('image') != '') {
                $image = $this->uploadImageWithCompress($request->file('image'), 'uploads/logos');
            }

        $data_array = array(
          'type' => $request->type,
          'link' => $request->link,
          'image'=>$image

       );
        $update = LogoMasterHelper::save($data_array);
        if ($update) {
            Session::flash('success', trans('messages.addedSuccessfully'));
            return redirect()->route('logo-master.index');
        }
        else {
            Session::flash('error', trans('messages.error'));
            return redirect()->back();
        }

    }
    public function show($id)
    {
        $data['blog']=LogoMasterHelper::getDetailsById ($id);
        if(isset($data['blog']->id)){
            return view('admin.blog.view_blog',$data);
        }else{
            abort(404);
           }
    }

    public function edit($id)
    {
        $auth = auth()->user();
        if(empty($auth)){
            return redirect('/login');
        }
        $data['logo']=LogoMasterHelper::getDetailsById($id);
        return view('admin.logo.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'link' => 'required'
        ]);

        $image = '';
        if ($request->file('image') != '') {
            $image = $this->uploadImageWithCompress($request->file('image'), 'uploads/logos');
        }

        $data_array = array(
        'type' => $request->type,
        'link' => $request->link
        );
        if ($image != '') {
            $data_array['image'] = $image;
        }

        $update = LogoMasterHelper::update($data_array,array('id'=>$request->id));
        if ($update) {
            Session::flash('success',trans('messages.updatedSuccessfully'));
            return redirect()->route('logo-master.index');
        }
        else {
            Session::flash('error', trans('messages.error'));
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $update = LogoMasterHelper::SoftDelete(array(),array('id'=>$id));
        if ($update) {
            return response()->json([
                'message' => trans('messages.deletedSuccessfully')
            ]);
            }
            else {
            return response()->json([
                'message' =>  trans('messages.error')
            ]);
        }
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\OurFeaturedHelper;
use Illuminate\Http\Request;
use App\Http\Traits\ImageUploadTrait;
use Validator;
use Session;

class OurFeaturedController extends Controller
{
    use ImageUploadTrait;
    public $successStatus =200;
    public function index()
    {
        return view('admin.our_featured.index');
    }

    public function ajaxList(Request $request){
        $data['page'] = $request->page;
        $title = $request->title;
        $created_date = $request->created_date;
        $data['query'] = OurFeaturedHelper::getListwithPaginate($title,$created_date);
        return view('admin.our_featured.our_featured_ajax',$data);
     }

    public function show($id)
    {
        // Logic to show a specific featured item
        return view('featured-item', ['id' => $id]);
    }

    public function create()
    {
        return view('admin.our_featured.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,bmp,tiff',
            'link' => 'required'
         ]);

         $image = '';
            if ($request->file('image') != '') {
                $image = $this->uploadImageWithCompress($request->file('image'), 'uploads/our_featured');

            }

        $data_array = array(
          'title' => $request->title,
          'link' => $request->link,
          'image'=>$image

       );
        $update = OurFeaturedHelper::save($data_array);
        if ($update) {
            Session::flash('success', trans('messages.addedSuccessfully'));
            return redirect()->route('our-featured');
        }
        else {
            Session::flash('error', trans('messages.error'));
            return redirect()->back();
        }

    }

    public function edit($id)
    {
        $data['query'] = OurFeaturedHelper::getDetailsById($id);
        return view('admin.our_featured.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required'
        ]);

        $image = '';
        if ($request->file('image') != '') {
            $image = $this->uploadImageWithCompress($request->file('image'), 'uploads/our_featured');
        }

        $data_array = array(
        'title' => $request->title,
        'link' => $request->link,
        );
        if ($image != '') {
            $data_array['image'] = $image;
        }

        $update = OurFeaturedHelper::update($data_array,array('id'=>$request->id));
        if ($update) {
            Session::flash('success',trans('messages.updatedSuccessfully'));
            return redirect()->route('our-featured');
        }
        else {
            Session::flash('error', trans('messages.error'));
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $update = OurFeaturedHelper::SoftDelete(array(),array('id'=>$id));
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

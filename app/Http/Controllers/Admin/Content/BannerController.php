<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\BannerRequest;
use App\Models\Admin\Content\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index(){
          $banners=Banner::query()->latest()->paginate(5);
          return view('admin.content.banner.index',compact('banners'));
    }


    public function create(){
        return view('admin.content.banner.create');
    }



    public function store(BannerRequest $request){
         $inputs=$request->all();
         Banner::query()->create($inputs);
         return to_route('admin.content.banner.index')->with('success','بنر با موفقت ایجاد شد');
    }


    public function show(string $id){
        //
    }


    public function edit(Banner $banner){
           return view('admin.content.banner.edit',compact('banner'));
    }


    public function update(BannerRequest $request,Banner $banner){
         $inputs=$request->all();
         $banner->update($inputs);
         return to_route('admin.content.banner.index')->with('success','بنر با موفقت بروزرسانی شد');
    }


    public function destroy(Banner $banner){
         $banner->delete();
         return to_route('admin.content.banner.index')->with('success','بنر با موفقت حذف شد');
    }


}

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
         return to_route('admin.content.banner.index')->with('success','بنر با موفقت حذف شد');
    }


    public function show(string $id){
        //
    }


    public function edit(string $id){
        //
    }


    public function update(Request $request, string $id){
        //
    }


    public function destroy(Banner  $banner){
         $banner->delete();
         return to_route('admin.content.banner.index')->with('success','بنر با موفقت حذف شد');
    }


}

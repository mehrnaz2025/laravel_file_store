<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\TagRequest;
use App\Models\Admin\Content\Menu;
use App\Models\Admin\Content\Tag;
use Illuminate\Http\Request;

class TagController extends Controller{


    public function index() {
        $tags=Tag::query()->latest()->paginate(5);
        return view('admin.content.tag.index',compact('tags'));
    }


    public function create(){
         return view('admin.content.tag.create');
    }


    public function store(TagRequest $request) {
           $inputs=$request->all();
           Tag::query()->create($inputs);
           return to_route('admin.content.tag.index')->with('success','تگ با موفقت ایجاد شد');
    }


    public function show(string $id) {
        //
    }


    public function edit(Tag $tag){
        return view('admin.content.tag.edit',compact('tag'));
    }


    public function update(TagRequest $request,Tag $tag) {
            $inputs=$request->all();
            $tag->update($inputs);
            return to_route('admin.content.tag.index')->with('swal-success',' تگ با موفقیت ویرایش شد');
    }


    public function destroy(Tag $tag){
        $tag->delete();
        return to_route('admin.content.tag.index')->with('success','تگ با موفقت حذف شد');


    }




    public function activeStatus(){
         $tags=Tag::activeTag()->latest()->paginate(5);
         return view('admin.content.tag.index',compact('tags'));
    }


    public function inactiveStatus(){
         $tags=Tag::inactiveTag()->latest()->paginate(5);
         return view('admin.content.tag.index',compact('tags'));
    }




}

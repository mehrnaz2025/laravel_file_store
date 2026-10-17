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


    public function edit(string $id){
        //
    }


    public function update(Request $request, string $id) {
        //
    }


    public function destroy(string $id){
        //
    }




    public function activeStatus(){
         $tags=Menu::activeTag()->latest()->paginate(5);
         return view('admin.content.tag.index',compact('tags'));
    }


    public function inactiveStatus(){
         $tags=Menu::inactivTag()->latest()->paginate(5);
         return view('admin.content.tag.index',compact('tags'));
    }




}

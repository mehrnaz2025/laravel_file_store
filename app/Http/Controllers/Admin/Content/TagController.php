<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content\Tag;
use Illuminate\Http\Request;

class TagController extends Controller{


    public function index() {
        $tags=Tag::query()->latest()->paginate(5);
        return view('admin.content.tag.index',compact('tags'));
    }


    public function create(){
        //
    }


    public function store(Request $request) {
        //
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
}

<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{

    public function index(){
          $categories=Category::query()->latest()->paginate(5);
         return view('admin.market.category.index',compact('categories'));
    }


    public function create(){
        $categories=Category::query()->whereNull('parent_id')->get();
        return view('admin.market.category.create',compact('categories'));
    }


    public function store(Request $request){

    }


    public function show(string $id){

    }


    public function edit(string $id){

    }


    public function update(Request $request, string $id){

    }


    public function destroy(string $id){

    }

    public function activeStatus(){

    }


    public function inactiveStatus(){

    }








}

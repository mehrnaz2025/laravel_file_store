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

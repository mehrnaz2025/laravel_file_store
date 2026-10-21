<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryRequest;
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


    public function store(CategoryRequest $request){
         $inputs=$request->all();
         Category::query()->create($inputs);
         return to_route('admin.market.category.index')->with('success','دسته بندی با موفقیت ایجاد شد');
    }


    public function show(string $id){

    }


    public function edit(Category $category){
         $categories=Category::query()->whereNull('parent_id')->get()->except($category->id);
         return view('admin.market.category.edit',compact('categories','category'));
    }


    public function update(CategoryRequest $request,Category $category){
            $inputs=$request->all();
            $category->update($inputs);
            return to_route('admin.market.category.index')->with('success','دسته بندی با موفقیت ویرایش شد');
     }


    public function destroy(Category $category){
        $category->delete();
        return to_route('admin.market.category.index')->with('success','دسته بندی با موفقیت حذف شد');

    }

    public function activeStatus(){
         $categories=Category::query()->activeCategory()->latest()->paginate(12);
         return view('admin.market.category.index',compact('categories'));
    }


    public function inactiveStatus(){
         $categories=Category::query()->inactiveCategory()->latest()->paginate(12);
         return view('admin.market.category.index',compact('categories'));
    }








}

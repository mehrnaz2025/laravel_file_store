<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductRequest;
use App\Models\Admin\Market\Category;
use App\Models\Admin\Market\Product;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller{

    public function index(){
        $products=Product::query()->latest()->paginate(5);
        return view('admin.market.product.index',compact('products'));
    }


    public function create(){
         $categories=Category::all();
         return view('admin.market.product.create',compact('categories'));
    }


    public function store(ProductRequest $request,ImageUploadService $imageUploadService) {
            $inputs=$request->all();
            if($request->hasFile('image')){
                    $result=$imageUploadService->uploadImage($request->file('image'));
                    if($result === false){
                         return back()->with('error', 'خطا در آپلود فایل');
                    }
                   $inputs['image']=$result;
            }

            $inputs['user_id']=Auth::id();
            Product::query()->create($inputs);
            return to_route('admin.market.product.index')->with('success',' محصول با موفقیت ایجاد شد');

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


    public function destroy(string $id){
        //
    }


       public function activeStatus(){
            $products=Product::query()->activeProducts()->latest()->paginate(12);
            return view('admin.market.product.index',compact('products'));
        }


        public function inactiveStatus(){
            $products=Product::query()->inactiveProducts()->latest()->paginate(12);
            return view('admin.market.product.index',compact('products'));
        }




}

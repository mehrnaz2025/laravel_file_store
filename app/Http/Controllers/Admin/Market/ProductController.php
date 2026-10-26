<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Category;
use App\Models\Admin\Market\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public function index(){
        $products=Product::query()->latest()->paginate(5);
        return view('admin.market.product.index',compact('products'));
    }


    public function create(){
         $categories=Category::all();
         return view('admin.market.product.create',compact('categories'));
    }


    public function store(Request $request) {
        //
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

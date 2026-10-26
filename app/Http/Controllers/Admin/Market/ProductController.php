<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public function index(){
        $products=Product::query()->latest()->paginate(5);
        return view('admin.market.product.index',compact('products'));
    }


    public function create(){
        //
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



}

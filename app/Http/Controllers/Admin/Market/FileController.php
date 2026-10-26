<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\File;
use App\Models\Admin\Market\Product;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index(Product $product){
            $files=File::query()->orderBy('number','ASC')->paginate(5);
            return view('admin.market.product.file-product.index',compact('files','product'));
    }


    public function create(Product $product){
        return view('admin.market.product.file-product.create',compact('product'));
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

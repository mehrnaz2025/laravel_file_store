<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\FileRequest;
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


    public function store(FileRequest $request,Product $product) {

           $inputs=$request->all();
           $mimeType = $request->file('file')->getMimeType();

           $mimes= ['audio/mpeg' => 0,  'audio/wav'  => 1, 'application/zip' => 2,'application/x-rar-compressed' => 3,
                    'application/x-7z-compressed'  => 4, 'application/x-tar' => 5,  'application/pdf' => 6, 'text/plain' => 7,
                    'application/x-rar'=>8
                  ];

            $typeNumber = $mimes[$mimeType];
            $path = $request->file('file')->store('uploads');
            $inputs['file']=$path;
            $inputs['original_name']=$request->file('file')->getClientOriginalName();
            $inputs['mime_type']=$request->file('file')->getMimeType();
            $inputs['size']=$request->file('file')->getSize();
            $inputs['extension']=$request->file('file')->getClientOriginalExtension();
            $inputs['type']=$typeNumber;
            $inputs['product_id']=$product->id;

            File::create($inputs);
            return to_route('admin.market.product-file.index',$product)->with('success',' فایل با موفقیت ایجاد شد');


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

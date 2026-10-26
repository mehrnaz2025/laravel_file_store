<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }


    public function rules(): array{

            if($this->isMethod('post')){
                    return [
                        'name'=>'required|min:2|max:1000|regex:/^[ا-یa-z0-9A-z۰-۹,،ئ.-يء ]+$/u',
                        'auther'=>'nullable|min:2|max:1000|regex:/^[ا-یa-zA-z,،ئ.-يء ]+$/u',
                        'speaker'=>'nullable|min:2|max:1000|regex:/^[ا-یa-zA-z,،ئ.-يء ]+$/u',
                        'description'=>'required|min:1|max:2000',
                        'price'=>'required|numeric',
                        'image'=>'required|image|mimes:png,jpg,jpeg,gif,webp',
                        'status'=>'required|in:0,1|numeric',
                        'category_id'=>'required|min:1|max:100000000|exists:categories,id|regex:/^[0-9]+$/u',

                    ];
            }else{
                    return [

                        'name'=>'required|min:2|max:1000|regex:/^[ا-یa-z0-9A-z۰-۹,،ئ.-يء ]+$/u',
                         'auther'=>'nullable|min:2|max:1000|regex:/^[ا-یa-zA-z,،ئ.-يء ]+$/u',
                        'speaker'=>'nullable|min:2|max:1000|regex:/^[ا-یa-zA-z,،ئ.-يء ]+$/u',
                        'description'=>'required|min:1|max:2000',
                        'price'=>'required|numeric',
                        'image'=>'image|mimes:png,jpg,jpeg,gif,webp',
                        'status'=>'required|in:0,1|numeric',
                        'category_id'=>'required|min:1|max:100000000|exists:categories,id|regex:/^[0-9]+$/u',
                    ];
            }
    }
}

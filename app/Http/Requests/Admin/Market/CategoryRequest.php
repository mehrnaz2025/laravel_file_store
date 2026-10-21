<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize(): bool{
        return true;
    }


    public function rules(): array{
            if($this->isMethod('post')){
                return [
                    'name'=>'required|min:2|max:120|regex:/^[ا-یa-z0-9A-z۰-۹,،ئ.-يء ]+$/u',
                    'description'=>'required|min:5|max:2000|regex:/^[ا-یa-z0-9A-z۰-۹,،ئ.-يء&\n\r;<>\/()%@ ]+$/u',
                    'status'=>'required|numeric|in:0,1',
                    'parent_id'=>'nullable|min:1|max:1000000|exists:categories,id|regex:/^[0-9]+$/u'
                ];
            }else{

                return [
                    'name'=>'required|min:2|max:120|regex:/^[ا-یa-z0-9A-z۰-۹,،ئ.-يء ]+$/u',
                    'description'=>'nullable|min:5|max:2000|regex:/^[ا-یa-z0-9A-z۰-۹,،ئ.-يء&\n\r;<>\/()%@ ]+$/u',
                    'status'=>'required|numeric|in:0,1',
                    'parent_id'=>'nullable|min:1|max:1000000|exists:categories,id|regex:/^[0-9]+$/u'
                ];
            }
    }
}

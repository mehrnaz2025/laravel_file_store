<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{

    public function authorize(): bool {
        return true;
    }

     public function rules(): array  {
             if($this->isMethod('post')){
                    return [
                        'name'=>'required|min:1|max:100|regex:/^[a-z0-9A-Z -_]+$/u',
                        'description'=>'required|min:2|max:1000|regex:/^[ا-یa-zA-z,،ئ.-يء ]+$/u',
                        'permissions.*' =>'string|exists:permissions,name'
                    ];

            }else{
                    return [
                        'name'=>'required|min:1|max:100|regex:/^[a-z0-9A-Z -_]+$/u',
                        'description'=>'required|min:2|max:1000|regex:/^[ا-یa-zA-z,،ئ.-يء ]+$/u',
                        'permissions.*' =>'string|exists:permissions,name'
                    ];
            }
    }
}

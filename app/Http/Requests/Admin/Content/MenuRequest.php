<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize(): bool {
        return true;
    }



    public function rules(): array{
             return [
                    'name'=>'required|min:2|max:120|regex:/^[ا-یa-zA-Z۰-۹0-9ء،.ي\ ]+$/u',
                    'url'=>'required|min:5|max:500|url',
                    'status'=>'required|numeric|in:0,1',
                    'order'=>'required|numeric|in:0,1',
                    'parent_id'=>'nullable|min:1|max:1000000|exists:menus,id|regex:/^[0-9]+$/u',
                ];
    }
}

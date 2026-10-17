<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }


    public function rules(): array {

         if($this->isMethod('post')){
                return [
                        'status' => 'required|numeric|in:0,1',
                        'name' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u|unique:tags,name',
                        'color' => 'required',
                ];
        }else{

            return [
                    'status' => 'required|numeric|in:0,1',
                    'name' => ['required','regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',Rule::unique('tags')->ignore($this->request->get('id'))],
                    'color' => 'required',
               ];
        }

    }


}

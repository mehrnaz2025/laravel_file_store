<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }


    public function rules(): array {


            if($this->isMethod('post')){
                    return [
                        'title'=>'required|min:2|max:1000|regex:/^[ا-یa-z0-9A-z۰-۹,،ئ.-يء ]+$/u',
                        'file' => 'required|file|mimes:pdf,zip,rar,mp3,7z,tar,wav,txt|max:204800',
                        'is_free_preview'=>'required|in:0,1|numeric',
                        'number'=>'required|numeric',
                        ];

            }else{
                    return [
                        'title'=>'required|min:2|max:1000|regex:/^[ا-یa-z0-9A-z۰-۹,،ئ.-يء ]+$/u',
                        'file' => 'nullable|file|mimes:pdf,zip,rar,mp3,7z,tar,wav,txt|max:204800',
                        'is_free_preview'=>'required|in:0,1|numeric',
                        'number'=>'required|numeric',
                        ];
            }

    }
}

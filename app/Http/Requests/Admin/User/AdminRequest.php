<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AdminRequest extends FormRequest
{

    public function authorize(): bool {
        return true;
    }


    public function rules(): array{
            if($this->isMethod('post')){

                return [
                    'name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                    'mobile' => ['required','digits:11', 'unique:users'],
                    'email' => ['required','string','email','unique:users'],
                    'password' => ['required','unique:users', Password::min(8)->letters()->mixedCase()->numbers(),'confirmed'],
                ];
            }
            else{
                return [
                        'name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                ];
            }

    }
}

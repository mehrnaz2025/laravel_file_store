<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }


    public function rules(): array{

            if($this->isMethod('post')){
                    return [
                    'user_id' => 'required|exists:users,id',
                    'balance' => 'integer|min:0',
                    ];

            }else{
                return [
                    'balance' => 'integer|min:0',
                ];
            }
    }
}

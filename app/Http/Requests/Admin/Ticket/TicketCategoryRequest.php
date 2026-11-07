<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TicketCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(){
           if($this->isMethod('post')){
                return [
                    'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                    'status' => 'required|numeric|in:0,1',
                ];
            }else{
                return [
                    'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                    'status' => 'required|numeric|in:0,1',
                ];
            }
    }


}

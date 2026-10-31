<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CoupanRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array{
        //dd(request()->all());
          if($this->isMethod('post')){
                    return [
                            'code'       => ['required', 'string', 'max:50', 'regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u','unique:coupans,code'],
                            'percent'    => 'required|integer|min:1|max:100',
                            'start_date' => 'required|numeric',
                            'status'     => 'required|in:0,1|numeric',
                            'end_date'   => 'required|numeric',
                       ];

            }else{
                    return [
                            'code'       => ['required', 'string', 'max:50','regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u', 'unique:coupans,code,'. request()->id],
                            'percent'    => 'required|integer|min:1|max:100',
                            'start_date' => 'required|numeric',
                            'status'     => 'required|in:0,1|numeric',
                            'end_date'   => 'required|numeric',
                       ];
            }
    }
}

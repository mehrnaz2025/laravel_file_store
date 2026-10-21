<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }


    public function rules(): array{

        return [
                'title'     => 'required|string|max:100',
                'description'=> 'required|string|max:255',
                'badge_text' => 'required|string|max:50',
                'badge_icon' => 'required|string|max:10',
                'badge_color'=> 'required|string|max:20',
                'expire_at'  => 'nullable|date|after:now',
                'link_url'   => 'nullable|url',
                'position'   => 'required|numeric|in:0,1',
                'status'     => 'required|numeric|in:0,1',
           ];


    }
}

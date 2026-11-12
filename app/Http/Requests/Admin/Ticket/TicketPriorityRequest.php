<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TicketPriorityRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {



        if ($this->isMethod('post')) {
            return [
                'status' => 'required|numeric|in:0,1',
                'name' => [
                    'required',
                    'string',
                    Rule::in(['کم', 'متوسط', 'بالا', 'فوری']),
                    Rule::unique('ticket_priorities', 'name')
                ],
            ];
        } else {
            //dd( $this->route('ticket_priority'));
            $ticketPriorityId = $this->route('ticket_priority')->id;

            return [
                'status' => 'required|numeric|in:0,1',
                'name' => [
                    'required',
                    'string',
                    Rule::in(['کم', 'متوسط', 'بالا', 'فوری']),
                    Rule::unique('ticket_priorities', 'name')->ignore($ticketPriorityId)
                ],
            ];
        }
    }






    public function messages(): array
    {
        return [
            'name.required' => 'نام اولویت الزامی است.',
            'name.in' => 'نام اولویت باید یکی از موارد زیر باشد: کم، متوسط، بالا، فوری',
            'name.unique' => 'این اولویت قبلاً ثبت شده است.'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_name' => 'required|max:100',
            'client_email' => 'required|email|max:200',
            'client_phone' => 'max:20',
            'subject' => 'required|max:50',
            'meeting_agenda' => 'required',
            'start_date' => 'date|after:yesterday'
        ];
    }
}

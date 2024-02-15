<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'Pc_Name' => ['required'],
            'Pc_Price' => ['required'],
            'StartTime' => ['required', 'date'],
            'EndTime' => ['required', 'date'],
            'User_Name' => ['required'],
            'duration' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

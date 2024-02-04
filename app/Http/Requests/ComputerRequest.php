<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'Pc_Name' => ['required'],
            'PC_IP' => ['required'],
            'Price' => ['required', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

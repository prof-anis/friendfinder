<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', Rule::unique('users', 'username')],
            'gender' => ['required'],
            'password' => ['required']
        ];
    }
}

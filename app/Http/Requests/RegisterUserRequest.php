<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required']
        ];
    }
}

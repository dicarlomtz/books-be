<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchBookRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'search_value' => ['required_without:available'],
            'available' => ['required_without:search_value', 'boolean']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchBookRequest extends FormRequest
{

    private $search_parameters = ['authors', 'co_authors', 'published_year', 'title'];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'search_parameter' => ['required', Rule::in($this->search_parameters)],
            'parameter_value' => ['required'],
            'available' => ['required', 'boolean']
        ];
    }
}

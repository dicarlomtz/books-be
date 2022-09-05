<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['string', 'max:100', 'nullable'],
            'description' => ['string', 'nullable'],
            'url' => ['url', 'nullable'],
            'published_year' => ['numeric', 'digits:4', 'max:' . now()->year, 'nullable'],
            'available' => ['boolean', 'nullable'],
            'authors' => ['array', 'nullable'],
            'co_authors' => ['array', 'nullable'],
            'cover_image' => ['url', 'nullable']
        ];
    }

    public function messages()
    {
        return [
            'published_year.max' => 'The published year must not be greater than the current year',
        ];
    }
}

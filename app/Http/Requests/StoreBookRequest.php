<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['string', 'max:100', 'required', 'unique:books'],
            'description' => ['string', 'required'],
            'url' => ['url', 'nullable'],
            'published_year' => ['numeric', 'digits:4', 'max:' . now()->year, 'required'],
            'available' => ['boolean', 'nullable'],
            'authors' => ['array', 'required'],
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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['string', 'max:100', 'required'],
            'description' => ['string', 'required'],
            'url' => ['url', 'nullable'],
            'published_year' => ['numeric', 'digits:4', 'max:' . now()->year, 'required'],
            'available' => ['boolean', 'nullable'],
            'authors' => ['array', 'required'],
            'co_authors' => ['array', 'nullable'],
            'cover_image' => ['url', 'nullable']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'published_year.max' => 'The published year must not be greater than the current year',
        ];
    }
}

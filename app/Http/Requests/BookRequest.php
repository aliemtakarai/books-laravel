<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'         => 'required',
            'category'      => 'required',
            'synopsis'      => 'required',
            'author'        => 'required'
        ];
    }

    /**
     * Custom Message for validation
     */
    public function messages()
    {
        return [
            'title.required'         => 'Title cannot be empty',
            'category.required'      => 'Category cannot be empty',
            'synopsis.required'      => 'Synopsis cannot be empty',
            'author.required'        => 'Author cannot be empty'
        ];
    }
}

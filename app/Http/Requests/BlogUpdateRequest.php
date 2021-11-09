<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
            'is_top' => [
                'nullable',
                'boolean',
            ],
            'title' => [
                'string',
                'min:5',
                'max:50',
            ],
            'file' => [
                'nullable',
                'file',
            ],
            'text' => [
                'string',
                'min:10',
                'max:1024',
            ],
        ];
    }
}

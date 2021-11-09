<?php

namespace App\Http\Requests;

class BlogCreateRequest extends BlogUpdateRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules['user_id'] = [
            'required',
            'integer',
            'exists:users,id',
        ];
        array_unshift($rules['title'], 'required');
        array_unshift($rules['text'], 'required');

        return $rules;
    }
}

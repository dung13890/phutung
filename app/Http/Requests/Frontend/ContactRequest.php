<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'topic' => 'required|min:2|max:40',
            'name' => 'required|min:2|max:40',
            'email' => 'required|email|max:255|min:2',
            'phone' => 'min:2|max:40',
            'content' => 'min:2|max:300'
        ];
    }
}

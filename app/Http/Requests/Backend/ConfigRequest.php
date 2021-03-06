<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class ConfigRequest extends Request
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
            'name' => 'required|min:4|max:255',
            'keywords' => 'required|min:4|max:255',
            'description' => 'required|min:4|max:255',
            'email' => 'required|email|min:4|max:255',
            'phone' => 'required|min:4|max:255',
            'address' => 'required|min:4|max:255',
            'logo_header'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            'logo_footer'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            // 'box_left_image'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            // 'box_right_image'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
        ];
    }
}

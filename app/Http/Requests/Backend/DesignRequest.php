<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class DesignRequest extends Request
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
            'design_name' => 'required|min:2|max:255',
            'design_order' => 'numeric',
            'design_image' => 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:1200'
        ];
    }
}

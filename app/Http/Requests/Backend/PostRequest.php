<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $all = $this->all();
        if ( !isset($all['locked']) || !$all['locked']) {
            $all['locked'] = false;
        }
        if ( !isset($all['featured']) || !$all['featured']) {
            $all['featured'] = false;
        }
        $this->replace($all);
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method()=='PATCH')
        {
            return [
                'name' => "required|min:4|max:255",
                'category_id' => "required",
                'locked' => 'sometimes|boolean',
                'seo_title' => "min:2|max:56",
                'seo_description' => "min:2|max:120",
                'image' => 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            ];
        } else {
            return [
                'name' => "required|min:4|max:255",
                'category_id' => "required",
                'locked' => 'sometimes|boolean',
                'seo_title' => "min:2|max:56",
                'seo_description' => "min:2|max:120",
                'image' => 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            ];
        }
    }
}

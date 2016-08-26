<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use Illuminate\Support\Str;

class ImageRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $all = $this->all();
        $all['name'] = Str::ascii($all['src']->getClientOriginalName());
        $all['size'] = $all['src']->getSize();
        $all['type'] = $all['src']->getMimeType();
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
        return [
            'src'=> 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
        ];
    }
}

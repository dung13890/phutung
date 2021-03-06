<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
        if ( isset($all['price']) && !empty($all['price']) ) {
            $all['price'] = str_replace(',','',$all['price']);
        }
        if ( isset($all['price_show']) && !empty($all['price_show']) ) {
            $all['price_show'] = str_replace(',','',$all['price_show']);
        }
        if (isset($all['youtube'])) {
            $all['youtube'] = $this->getKeyYoutube($all['youtube']);
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
                'name' => "required|min:2|max:255",
                'code' => "required|alpha_dash|min:2|unique:products,code," . $this->product,
                'category_id' => "required|not_in:0",
                'sale' => "sometimes|boolean",
                'locked' => 'sometimes|boolean',
                'featured' => 'sometimes|boolean',
                'seo_title' => "min:2|max:56",
                'seo_description' => "min:2|max:120",
                'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
                'icon'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
                'file'=> 'mimes:pdf,jpeg,jpg,doc,xls,xlsx,png|max:1200',
            ];
        }
        else{
            return [
                'name' => "required|min:2|max:255",
                'code' => "required|alpha_dash|min:2|unique:products",
                'category_id' => "required|not_in:0",
                'sale' => "sometimes|boolean",
                'locked' => 'sometimes|boolean',
                'featured' => 'sometimes|boolean',
                'image'=> 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
                'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
                'file'=> 'mimes:pdf,jpeg,jpg,doc,xls,xlsx,png|max:1200',
                'seo_title' => "min:2|max:56",
                'seo_description' => "min:2|max:120",
                'type' => "required|in:". implode(',',config('developer.typeProduct'))
            ];
        }
    }

    public function getKeyYoutube($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }
        return $url;
    }
}

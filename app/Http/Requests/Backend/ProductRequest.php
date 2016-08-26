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
        if ( !isset($all['sale']) || !$all['sale']) {
            $all['sale'] = false;
        }
        if ( isset($all['price']) && !empty($all['price']) ) {
            $all['price'] = str_replace(',','',$all['price']);
        }
        if ( isset($all['price_sale']) && !empty($all['price_sale']) ) {
            $all['price_sale'] = str_replace(',','',$all['price_sale']);
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
                'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            ];
        }
        else{
            return [
                'name' => "required|min:2|max:255",
                'code' => "required|alpha_dash|min:2|unique:products",
                'category_id' => "required|not_in:0",
                'sale' => "sometimes|boolean",
                'locked' => 'sometimes|boolean',
                'image'=> 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            ];
        }
    }
}

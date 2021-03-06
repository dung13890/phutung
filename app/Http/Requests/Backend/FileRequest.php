<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class FileRequest extends Request
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
                'locked' => 'sometimes|boolean',
                'file'=> 'mimes:pdf,jpeg,jpg,doc,xls,xlsx,png|max:1200',
            ];
        }
        else{
            return [
                'name' => "required|min:2|max:255",
                'locked' => 'sometimes|boolean',
                'file'=> 'required|mimes:pdf,jpeg,jpg,doc,xls,xlsx,png|max:1200',
            ];
        }
    }
}

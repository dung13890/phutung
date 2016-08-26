<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class PageRequest extends Request
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
        return [
            'name' => "required|min:4|max:255",
            'locked' => 'sometimes|boolean',
        ];
    }
}

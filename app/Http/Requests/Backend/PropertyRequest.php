<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class PropertyRequest extends Request
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
        if (($all['group'] != 0) || empty($all['key'])) {
            $all['key'] = $all['group'];
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
            'key' => "required|min:2|max:255",
            'name' => "required|min:2|max:255",
            'locked' => 'sometimes|boolean',
        ];
    }
}

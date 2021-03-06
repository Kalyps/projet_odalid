<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GacheRequest extends FormRequest
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
            'ip' => 'bail|required',
            'mac' => 'bail|required',
            'nom' => 'bail|required',
            'type' => 'bail|required',
        ];
    }
}

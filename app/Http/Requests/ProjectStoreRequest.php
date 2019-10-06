<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'client_id'     => 'required|integer',
            'title'         => 'required',
            'slug'          => 'required|unique:portfolios,slug',
            'date'          => 'required',
            'place'         => 'required',
            'banner'        => 'required|mimes:jpg,jpeg,png',
        ];
    }
}

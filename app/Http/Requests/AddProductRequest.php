<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'          => 'required',
            'price'         => 'required|numeric',
            'categoryId'    => 'required',
            'brandId'       => 'required',
            'sale'          => 'required',
            'discount'      => 'nullable|numeric',
            'image.*'         => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'description'   => 'required',
        ];
    }
}

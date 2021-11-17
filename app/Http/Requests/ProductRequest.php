<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'searchText' => 'nullable|string',
            'pageSize' => 'nullable|integer',
            'sortBy' => 'nullable|string|in:name_asc,name_desc,gross_price_asc,gross_price_desc',
        ];
    }
}

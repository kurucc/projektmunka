<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyersRegisterRequest extends FormRequest
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
            'username' => 'required|string|min:6|max:30|unique:buyers,username',
            'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,30}$/',
            'email' => 'required|email|unique|max:30',
            'birthday' => 'required|date',
            'tel' => 'string|min:12|max:12',
            'delivery_zip' => 'required|string|min:4|max:4',
            'delivery_address' => 'required|string|max:50',
            'delivery_city' => 'required|string|max:30',
            'invoice_zip' => 'required|string|min:4|max:4',
            'invoice_city' => 'required|string|max:30',
            'invoice_address' => 'required|string|max:50',
        ];
    }
}

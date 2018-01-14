<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        if (request('id', '')) {
            return [
                "phone" => "required|unique:admins,phone," . $this->id,
            ];
        } else {
            return [
                "phone" => "required|unique:admins,phone"

            ];
        }

    }

    public function messages()
    {
        $message = [
            'phone.required' => '手机号不能为空',
        ];
        if (request('id', '')) {
            $message['phone.unique'] = '手机号已存在';
        }

        return $message;
    }
}

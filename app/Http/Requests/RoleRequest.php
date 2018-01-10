<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                'name'         => 'required|unique:roles,name,' . $this->id,
                'display_name' => 'required',
                'description'  => 'max:100',
            ];
        } else {
            return [
                'name'         => 'required|unique:roles,name',
                'display_name' => 'required',
                'description'  => 'max:100',
            ];
        }
    }

    public function messages()
    {
        $message = [
            'name.required'         => '角色标识不能为空',
            'display_name.required' => '角色名不能为空',
            'description'           => '“角色说明”不能大于100个字。',
        ];
        if (request('id', '')) {
            $message['name.unique'] = '角色标识已存在';
        }

        return $message;
    }
}

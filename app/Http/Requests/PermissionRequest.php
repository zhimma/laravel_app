<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
                'name' => 'required|unique:permissions,name,' . $this->id,
                'display_name' => 'required',
                'description' => 'max:100',
            ];
        } else {
            return [
                'name' => 'required|unique:permissions,name',
                'display_name' => 'required',
                'description' => 'max:100',
            ];
        }
    }

    public function messages()
    {
        return  [
            'name.required'      => '权限标识不能为空',
            'name.unique'        => '权限标识已存在',
            'display_name.required' => '权限名不能为空',
            'description' => '“权限说明”不能大于100个字。',
        ];
    }
}

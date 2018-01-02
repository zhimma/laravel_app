<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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

        if (!request('parent_id', 0)) {
            $rules = [
                'parent_id' => 'required',
            ];
        } else {
            $rules = [
                'parent_id' => 'required',
                'url'       => 'required'
            ];
        }
        if (request('id', '')) {
            $rules['name'] = 'required|unique:menus,name,' . $this->id;
        } else {
            $rules['name'] = 'required|unique:menus,name';
        }

        return $rules;
    }

    public function messages()
    {
        $message = [
            'name.required'      => '菜单名称不能为空',
            'name.unique'        => '菜单名称不能重复',
            'parent_id.required' => '父级菜单不能为空',
        ];
        if (request('parent_id', 0)) {
            $message['url.required'] = '菜单链接url不能为空';
        }

        return $message;
    }
}

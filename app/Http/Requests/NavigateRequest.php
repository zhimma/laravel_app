<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NavigateRequest extends FormRequest
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
                'name' => 'required|unique:navigates,name,' . $this->id,
                'url'  => 'required'
            ];
        } else {
            return [
                'name' => 'required|unique:navigates,name',
                'url'  => 'required'
            ];
        }
    }

    public function messages()
    {
        $messages = [
            'url.required'  => 'URL不能为空',
            'name.required' => '名称不能为空'
        ];
        if (request('id')) {
            $messages['name.unique'] = '名称已存在';
        }

        return $messages;
    }
}

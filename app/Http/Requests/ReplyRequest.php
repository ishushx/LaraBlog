<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
{
//    protected $redirect="#reply_form";
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
        switch ($this->method()) {
            case 'POST':
                {
                    return [
                        'name' => 'required|min:3',
                        'email' => 'required|email',
                        'content' => 'required|min:2',
                    ];
                }
            case 'DELETE':
                {
                    return [
                        'email' => 'required|email',
                    ];
                }
        }

    }

    public function attributes()
    {
        return [
            'name' => '用户名',
            'email' => '邮箱地址',
            'content' => '评论内容',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.min' => '用户名不能小于三个字符',
            'email.required' => '邮箱地址不能为空',
            'email.email' => '请输入正确的邮箱地址',
            'content.required' => '评论内容不能为空',
            'content.min' => '评论内容不少于 2 个字符',
        ];
    }
}

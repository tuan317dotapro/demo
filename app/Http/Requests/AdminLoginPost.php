<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // file này để kiểm tra Login
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
            'username' => 'required|min:3|max:60',
            'password' => 'required|min:3|max:60',
        ];
    }

    public function messages($value='')
    {
        // thông báo lỗi ra ngoài form nếu nhập sai
        return [
            'username.required' => ':attribute Không được để trống',
            'username.min' => ':attribute Không nhỏ hơn :min kí tự',
            'username.max' => ':attribute Không lớn hơn :max kí tự',
            'password.required' => ':attribute Không được để trống',
            'password.min' => ':attribute Không nhỏ hơn :min kí tự',
            'password.max' => ':attribute Không lớn hơn :max kí tự',
        ];
    }
}

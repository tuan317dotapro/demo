<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class SaveStaffInfo extends FormRequest
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
    public function rules(Request $request)
    {
        $id = $request->id;
        $unique = ($id) ? 'unique:staff, name_staff,'.$id : 'unique:staff,name_staff';

        return [
            // giá trị lấy từ staff.add_view, thuộc tính name=""
            'nameStaff' => 'required',
            'room' => 'required',
            'ranking' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required', 'unique',
            'email' => 'required', 'unique',
        ];
    }

    public function messages()
    {
        return [
            'nameStaff.required' => ':Attribute không được để trống!',
            'room.required' => ':Attribute không được để trống!',
            'ranking.required' => ':Attribute không được để trống!',
            'birth.required' => ':Attribute không được để trống!',
            'gender.required' => ":Attribute không được để trống",
            'address.required' => ":Attribute không được để trống!",
            'phone.required' => ":Attribute không được để trống!",
            'phone.unique' => ":Attribute đã tồn tại! Vui lòng nhập lại!",
            'email.required' => ":Attribute không được để trống",
            'email.unique' => ":Attribute đã tồn tại! Vui lòng nhập lại!"
        ];
    }
}

<?php
/*Thực hiện xác nhận các dữ liệu nhập vào khi tạo hoặc sửa một nhân viên, đảm bảo dữ liệu nhập vào đúng*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckEmployeeRequest extends Request
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
            //
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|unique:employees|max:255',
            'job' => 'required',
            'phone' => 'required|unique:employees|max:12',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên nhân viên',
            'name.min' => 'Tên nhân viên phải ít nhất 6 ký tự',
            'name.max' => 'Tên nhân viên không hợp lệ',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Hãy nhập đúng email',
            'email.unique' => 'Email đã tồn tại',
            'email.max' => 'Email không hợp lệ',
            'job.required' => 'Vui lòng nhập công việc',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.max' => 'Số điện thoại không hợp lệ'
        ];
    }
}

<?php
/*Thực hiện xác nhận các dữ liệu nhập vào khi tạo hoặc sửa một phòng ban, đảm bảo dữ liệu nhập vào đúng*/
namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckDepartmentRequest extends Request
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
            'name' => 'required|unique:departments|max:255',
            'office_number'=>'required|unique:departments',
            'manager' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên phòng ban',
            'name.unique' => 'Tên phòng ban đã tồn tại',
            'office_number.required' => 'Vui lòng nhập tên phòng ban',
            'office_number.unique' => 'Số phòng đã tồn tại',
            'manager.required' => 'Vui lòng nhập tên quản lý'
        ];
    }
}

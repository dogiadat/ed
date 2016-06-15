<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CheckEmployeeRequest;
use App\Employee;
use App\Department;
use App\Project;
use App\EmployeeProject;

class EmployeesController extends Controller
{
    // Trang hiển thị nhân viên.
    public function index(){
    	$employee = Employee::all();
        $departments = Department::pluck('name', 'id');
    	return view('employees.employees', compact('departments'))-> with('employees',$employee);
    }

    //Yêu cầu chuyển sang trang tạo thành viên
    public function create(){
        // $department = Department::all();
        $departments = Department::pluck('name', 'id');
        return view('employees.create', compact( 'departments'));
    }
    //lưu nhân viên sau khi submit tại file create, request bao gồm thông tin cho nhân viên mới
    public function store(CheckEmployeeRequest $request){
        //Tạo một biến employee để lấy dữ liệu từ request
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->job = $request->job;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->department_id = $request->department_id;
        //lưu trữ ảnh đại diện
        if($request->hasFile('avatar')){    
            if($request->file('avatar')->isValid()){
                $employee->photo = time().rand(0,1000); //Tạo ra tên file để lưu vào database
                $request->file('avatar')->move(base_path().'/public/img',$employee->photo); // lưu trữ hình ảnh vào public/img
            }
        }
        $employee->save();
        return redirect('employees');
    }

    //Tiến hành vào trang sửa nhân viên có id là $id
    public function edit($id){
    	$employee = Employee::findOrFail($id);
        $departments = Department::pluck('name', 'id');
    	return view('employees.edit', compact('employee','departments'));
    }

    //update nhân viên sau khi edit.
    public function update($id,Request $request){
        $employee = Employee::findOrFail($id);
        if($employee->phone != $request->phone){
            $this->validate($request, [
                'phone' => 'unique:employees',
            ],
            [
                'phone.unique' => 'Số điện thoại đã tồn tại',
            ]);
        }
        if($employee->email != $request->email){
            $this->validate($request, [
                'email' => 'unique:employees',
            ],
            [
                'email.unique' => 'Email đã tồn tại',
            ]);
        }
        $this->validate($request, [
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|max:255',
            'job' => 'required',
            'phone' => 'required|max:12',
        ],
        [
            'name.required' => 'Vui lòng nhập tên nhân viên',
            'name.min' => 'Tên nhân viên phải ít nhất 6 ký tự',
            'name.max' => 'Tên nhân viên không hợp lệ',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Hãy nhập đúng email',
            'email.max' => 'Email không hợp lệ',
            'job.required' => 'Vui lòng nhập công việc',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.max' => 'Số điện thoại không hợp lệ'
        ]);
    	$employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->job = $request->job;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->department_id = $request->department_id;
        if($request->hasFile('avatar')){    
            if($request->file('avatar')->isValid()){
                if ($employee->photo == "") {
                    $employee->photo = time().rand(0,1000);
                }
                $request->file('avatar')->move(base_path().'/public/img',$employee->photo);
            }
        }
        $employee->update(); //update nhân viên ở database
        return redirect('employees'); // chuyển đến trang nhân viên.
    }

    // hàm xóa nhân viên mã $id
    public function destroy($id){
    	$input = Employee::findOrFail($id);
    	$input->delete();
    	return redirect('employees');
    }

    //xem profile của nhân viên
    public function show($id){
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }

    //Tìm kiếm nhân viên theo tên và theo phòng ban
    public function search(Request $request){
        if($request->department_id == "") // nếu phòng ban không được chọn
            $employees = Employee::where('name','like',"%$request->name%")->get();    // chọn ra những nhân viên có tên chứa $request->namne
        else // nếu phòng ban được chọn
            $employees = Employee::where('name','like',"%$request->name%")->where("department_id","$request->department_id")->get(); // chọn ra nhân viên có tên chứ $request->name và mã phòng ban là $department_id
        $departments = Department::all(); // phục vụ cho select phòng ban trong form search
        //return view('employees.employees',compact('employees','departments'));
        $name = $request->name;
        $deparments_id = $request->department_id;
        return view('employees.employees', compact('departments','employees','name','department_id'));
    }

}


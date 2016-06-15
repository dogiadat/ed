<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Department;
use App\Http\Requests\CheckDepartmentRequest;

class DepartmentsController extends Controller
{
  //trang chính của phòng ban
    public function index(){
    	$department = Department::all();
    	return view('departments.departments')->with('departments',$department);
    }

    // vào trang tạo phòng ban
   	public function create(){
   		return view('departments.create');
   	}

    // lưu phòng ban sau khi xác nhận tạo
   	public function store(CheckDepartmentRequest $request){
      $input = $request->all();
      Department::create($input);
      return redirect('departments');
   	}

    // vào trang sửa phòng ban mã $id
    public function edit($id){
      $department = Department::findOrFail($id);
      return view('departments.edit', compact('department'));
    }
    //update phòng ban sau khi sửa
    public function update($id,Request $request){
      $department = Department::findOrFail($id);
      if($department->office_number != $request->office_number){
            $this->validate($request, [
                'office_number' => 'unique:departments',
            ],
            [
              'office_number.unique' => 'Số phòng đã tồn tại'
            ]
            );
        }
        if($department->name != $request->name){
            $this->validate($request, [
                'name' => 'unique:departments',
            ],
            [
              'name.unique' => 'Tên phòng ban đã tồn tại'
            ]
            );
        }
        $this->validate($request, 
          [
            'name' => 'required|max:255',
            'office_number'=>'required',
            'manager' => 'required',
          ],
          [
            'name.required' => 'Vui lòng nhập tên phòng ban',
            'name.max' => 'Tên phòng ban không hợp lệ',
            'office_number.required' => 'Vui lòng nhập số phòng',
            'manager.required' => 'Vui lòng nhập tên quản lý'
          ]
          );

      $department->update($request->all());

      return redirect('departments');
    }

    //xóa phòng ban trong database
    public function destroy($id){
      $department = Department::findOrFail($id);
      $department -> delete();
      return redirect('departments');
    }

    //xem thông tin phòng ban
    public function show($id){
      $department = Department::findOrFail($id);
      return view('departments.show', compact('department'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;
use App\Employee;
use App\EmployeeProject;

class ProjectsController extends Controller
{
    //
    public function index(){
    	$projects = Project::all();
    	return view('projects.projects',compact('projects'));
    }


    public function create(){
        $employees = Employee::all();
    	return view('projects.create', compact('employees'));
    }

    public function store(Request $request){
        $this->validate($request, [
                'name' => 'required|unique:projects',
                'describe' => 'required|max: 255',
            ],
            [
                'name.unique' => 'Số điện thoại đã tồn tại',
                'name.required' => 'Vui lòng điền tên dự án',
                'describe.required' => 'Vui lòng điền mô tả',
                'describe.max' => "Mô tả không hợp lệ"
            ]);
        $p = new Project;
        $p->name = $request->name;
        $p->describe = $request->describe;
        $p->save();
        if(Employee::first()){
            $employees = $request->employees_id;
            foreach ($employees as $key => $value) {
                $ep = new EmployeeProject;
                $ep->project_id = $p->id;
                $ep->employee_id = $key;
                $ep->save();
            }
        }

        //$ep = new EmployeeProject
    	// $project = new Project;
    	// $project->name = $request->name;
    	// $project->describe = $request->describe;
    	// $project->save();

    	return redirect('projects/'.$p->id);
    }
    public function show($id){
    	$project = Project::find($id);
        return view('projects.show', compact('project'));
    }

    public function destroy($id){
        Project::find($id)->delete();
        return redirect('projects');
    }
}

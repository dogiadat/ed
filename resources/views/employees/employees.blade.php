@extends('layouts.app')

@section('content')
<div class="container">
	@if(!Auth::guest())
	<div class="panel-body" style="font-family: time new roman;">
		<h1 style="color:red;"; align="center">Trang quản lý nhân viên</h1>
	</div>	

	@if(App\Department::count() == 0)
	<h3 style="color: #009FFF;">Tạo phòng ban để thêm nhân viên <a href = {{url('departments/create')}}>Tại đây</a></h3>
	@else
	<a href="{{url('employees/create')}}" class='btn btn-info btn-lg' role='button'> <i class="glyphicon glyphicon-plus"></i> Thêm nhân viên</a>
	@endif
	<br>
	<br>

	@else
	<div class="panel-body" style="font-family: time new roman;">
		<h1 style="color:red;"; align="center">Danh sách nhân viên</h1>
	</div>	
	@endif
	<!-- Tìm kiếm nhân viên -->
	<div class="search">
		<form action="{{url('employees/search')}}" method="get" role='search' accept-charset="utf-8" class="form-inline">
			<input type="text" name='name' id="search_name" placeholder="Tên nhân viên" class="form-control" >
			<select name="department_id" id="search_department_id" class="form-control">
				<option value="">Phòng ban</option>
				@foreach(app\Department::all() as $department)	
				<option value="{{$department->id}}">{{$department->name}}</option>
				@endforeach
			</select>
			<button type="submit" class="btn btn-success" >Tìm kiếm</button>	
			<button type="button" class="btn btn-default" id="btnClear">Clear</button>
		</form>

	</div>
	<div>
		<h3>Nhân viên</h3>
		<div class="panel panel-primary">
			<!-- lấy nhân viên trong database in ra màn hình -->
			@if(count($employees)>0)
			<table class="table table-hover">
				<thead style="background: #337AB7; color:#fff;">
					<tr>
						<th>Tên nhân viên</th>
						<th>Công việc</th>
						<th>Email</th>
						<th>Phòng ban</th>
						@if(Auth::check())
						<th><th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($employees as $employee)
						<tr>
							<td><a href="{{url('employees/'.$employee->id)}}">{{$employee->name}}</a></td>
							<td>{{$employee->job}}</td>
							<td>{{$employee->email}}</td>
							<td>{{$employee->department->name}}</td>
							@if(Auth::check())
							<td>
								<div class="form-group">	                                        
									<form action="{{url('employees/'.$employee->id)}}" method="POST">
										{!! csrf_field() !!}
										{!! method_field('DELETE') !!}
										<a href="{{url('employees/'.$employee->id.'/edit')}}" class="btn btn-info btn-xs">
											<span class="glyphicon glyphicon-pencil">
											</span>Sửa
										</a>
										<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn xóa nhân viên không?')">
											Xóa
										</button>
									</form>
								</div>
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
				<div class="panel-body">
					<b>Không có nhân viên nào</b> 
				</div>
				@endif

			</div>
		</div>

	</div>
	@endsection

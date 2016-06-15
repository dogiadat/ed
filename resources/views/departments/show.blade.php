@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="font-size: 20px; background-color:#fff;"><b>Thông tin phòng ban {!! $department->name !!}</b>

                </div>
                <div class="panel-body">
                	<table class="table">
                		<tbody>
                			<tr>
                				<td><label>Tên</label></td>
                				<td>{{$department->name}}</td>
                			</tr>
                			<tr>
                				<td><label>Số phòng</label></td>
                				<td>{{$department->office_number}}</td>
                			</tr>
                			<tr>
                				<td><label>Quản lý</label></td>
                				<td>{{$department->manager}}</td>
                			</tr>
                		</tbody>
                	</table>
                    <div style="float:left">
                        <a href="{{url('departments')}}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
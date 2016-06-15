@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="font-size: 20px; background-color: #fff;"><b>Thông tin nhân viên {!! $employee->name !!}</b></div>
                <div class="panel-body">
                	<div class = "row">
                            <div class="col-sm-5">
                                @if($employee->photo == '')
                                    <img src="{{asset('img/avatar-icon.png')}}" class="img-responsive" alt="Ảnh đại diện"></img>
                                @else
                                    <img src="{{asset('img/'.$employee->photo)}}" class="img-responsive" alt="Ảnh đại diện"></img>
                                @endif
                            </div>
                            <div class="col-sm-7">
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <td>Họ tên: </td>
                                            <td>{{$employee->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phòng ban</td>
                                            <td>{{$employee->department->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Công việc</td>
                                            <td>{{$employee->job}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$employee->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{$employee->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Dự án tham gia:</td>
                                            <td>
                                                @foreach($employee->projects as $project)
                                                    {{ $project->name }} <br> 
                                                @endforeach
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="form-group" align="center"><a href="{{url('employees')}}" class="btn btn-default">Trở về</a></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
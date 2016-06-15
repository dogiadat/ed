@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-body"></div>
                <div class="panel-body" align="center" style="font-size:40px;color:blue">
                    <img src="{{asset('img/hello.jpg')}}" alt="welcome" style="width:30%;height:30%;float:right;">
                    <b>Xin chào quản trị viên {{Auth::user()->name}}, cùng quản lý nhân viên trong công ty của mình nào!!!</b>
                    <br>
                    <a href="{{url('employees')}}" class="btn btn-lg btn-danger">Start</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

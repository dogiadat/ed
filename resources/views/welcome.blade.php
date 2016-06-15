@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-body"></div>
                <div class="panel-body" align="center" style="font-size:20px;color:blue">
                    <p><b>Chào mừng bạn đến với trang quản lý nhân viên của công ty <br> <span style="font-size:30px;color:red">Gia Đạt</span></b></p>
                    <img src="{{asset('img/welcome.jpg')}}" alt="welcome" style="width:70%;height:70%;">
                    <br>
                    <a href="{{url('employees')}}" class="btn btn-danger btn-lg">Bắt đầu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

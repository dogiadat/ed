@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"  style="font-size: 20px; background-color:#fff;">Thêm dự án</div>
                <div class="panel-body">
                    @if($errors->any())
                        <ul class="errors">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    @endif
                    <form  action="{{url('projects')}}"  method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label name="name">Tên dự án: </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label name="manager">Mô tả: </label>
                            <textarea name="describe" id="describe"  placeholder="Mô tả dự án" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nhân viên</label>
                            @foreach($employees as $employee)
                            <br>
                                <input type="checkbox" name="employees_id[{{ $employee->id }}]">{{ $employee->name }}   
                            @endforeach
                        </div>
                        <div class="form-group" align="center"><button type="submit" class="btn btn-success">Thêm dự án</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
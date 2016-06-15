@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chỉnh sửa nhân viên {!! $employee->name !!}</div>
                <div class="panel-body">
                    @if ( $errors->any() )
                            <ul class="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>   
                    @endif
                    {!! Form::open(['url' => "employees/{$employee->id}", 'method' => 'post', 'files' => 'true']) !!}
                        {!! Form::hidden('id',$employee->id) !!}
                        <div class = "row">
                            <div class="col-sm-5">
                                @if($employee->photo == "")
                                    <img src="{{asset('img/'.'avatar-icon.png')}}" class="img-responsive" alt="Ảnh đại diện">
                                @else
                                    <img src="{{asset('img/'.$employee->photo)}}" class="img-responsive" alt="Ảnh đại diện">
                                @endif
                                <input type="file" name="avatar">
                            </div>
                            <div class="col-sm-7">
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <td>{!! Form::label('name','Họ tên:') !!}</td>
                                            <td>{!! Form::text('name',$employee->name,['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('department_id','Phòng ban:') !!}</td>
                                            <td>{!! Form::select('department_id', $departments, $employee->department_id, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('email','Email:') !!}</td>
                                            <td>{!! Form::text('email',$employee->email,['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('job','Công việc:') !!}</td>
                                            <td>{!! Form::text('job',$employee->job,['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('phone','Số điện thoại:') !!}</td>
                                            <td>{!! Form::tel('phone',$employee->phone,['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="form-group" align="center">{!! Form::submit('Cập nhật',['class' => 'btn btn-success'])!!}</div>
                            </div>
                        </div>                            
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px; background-color:#fff;">Thêm nhân viên mới</div>
                <div class="panel-body">
                    @if ( $errors->any() )
                            <ul class="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>   
                    @endif
                    {!! Form::open(['url' => 'employees', 'method' => 'post', 'files' => 'true']) !!}
                        <div class = "row">
                            <div class="col-sm-5">
                                <img src="{{asset('img/avatar-icon.png')}}" class="img-responsive" alt="Ảnh đại diện"></img>
                                {!! Form::file('avatar') !!}
                            </div>
                            <div class="col-sm-7">
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <td>{!! Form::label('name','Họ tên:') !!}</td>
                                            <td>{!! Form::text('name',null,['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('department_id','Department:') !!}</td>
                                            <td>
                                                @if(count($departments)>0)
                                                    {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
                                                @else
                                                    Không có phòng ban nào
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('email','Email:') !!}</td>
                                            <td>{!! Form::text('email',null,['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('job','Jobtitle:') !!}</td>
                                            <td>{!! Form::text('job',null,['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! Form::label('phone','Phone:') !!}</td>
                                            <td>{!! Form::tel('phone',null,['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group" align="center">{!! Form::submit('Thêm mới',['class' => 'btn btn-success'])!!}</div>
                            </div>
                        </div>                            
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

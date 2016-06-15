@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#fff;color:#FF0808">Chỉnh sửa phòng ban {!! $department->name !!}</div>
                <div class="panel-body">
                    @if ( $errors->any() )
                            <ul class="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>   
                    @endif
                    {!! Form::model($department,['method' => 'PATCH', 'action' => ['DepartmentsController@update', $department->id]]) !!}
                        
                                <div class="form-group">
                                    {!! Form::label('name','Tên phòng ban:') !!}
                                    {!! Form::text('name',null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('office_number','Số phòng: ') !!}
                                    {!! Form::text('office_number',null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('manager','Quản lý:') !!}
                                    {!! Form::text('manager',null, ['class' => 'form-control']) !!}
                                </div>

                        <div align="center">
                            {!! Form::submit('Xác nhận',['class'=>'btn btn-success'])!!}
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

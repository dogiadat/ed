@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Thêm nhân viên mới</div>
                <div class="panel-body">
                    @if ( $errors->any() )
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>   
                    @endif
                    {!! Form::open(['url' => 'demo']) !!}
                        <table>

                            <tbody>
                                <tr>
                                    <td>{!! Form::label('name','Họ tên:') !!}</td>
                                    <td>{!! Form::text('name') !!} <br /><br></td>
                                </tr>
                                <tr>
                                    <td>{!! Form::label('email','Email:') !!}</td>
                                    <td>{!! Form::text('email') !!} <br /><br></td>
                                </tr>
                                <tr>
                                    <td>{!! Form::label('job','Jobtitle:') !!}</td>
                                    <td>{!! Form::text('job') !!} <br /><br></td>
                                </tr>
                                <tr>
                                    <td colspan="2">{!! Form::submit('Thêm mới')!!}</td>
                                </tr>
                            </tbody>
                        </table>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

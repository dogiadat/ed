@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="font-size: 20px; background-color: #fff;"><b>Thông tin dự án {!! $project->name !!}</b>
                </div>
                <div class="panel-body">
                	<table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Tên dự án: </td>
                                <td>{{$project->name}}</td>
                            </tr>
                            <tr>
                                <td>Mô tả</td>
                                <td>{{$project->describe}}</td>
                            </tr>
                            @if(count($project->employees) > 0)
                     		<tr>

                                <td>Nhân viên tham gia</td>
                                <td>
                                	@foreach($project->employees as $employee)
                                		{{ $employee->name }} <br>	
                                	@endforeach
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <br>
                    <div class="form-group" align="center"><a href="{{url('projects')}}" class="btn btn-default">Trở về</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
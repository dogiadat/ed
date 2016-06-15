@extends('layouts.app')

@section('content')

    <div class="container">
		@if(Auth::check())
            <div class="panel-body" style="font-family: time new roman;">
                <h1 style="color:red;"; align="center">Trang quản lý dự án</h1>
            </div>  
                
            <a href="{{ url('projects/create') }}" class='btn btn-success btn-lg' role='button'> <i class="glyphicon glyphicon-plus"></i> Thêm dự án</a>
            <br>
            <br>
        @else
            <div class="panel-body" style="font-family: time new roman;">
                <h1 style="color:red;"; align="center">Danh sách dự án</h1>
            </div>
        @endif

        <div class="panel panel-primary">
            @if(count($projects))
            	<table class="table table-hover">
            		<thead>
            			<tr>
            				<th>Tên dự án</th>
            				<th>Mô tả</th>
                            @if(Auth::check())
                                <th>Thao tác</th>
                            @endif
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($projects as $project)
    	        			<tr>
    	        				<td><a href="{{ url('projects/'.$project->id) }}">{{$project->name}}</a></td>
    	        				<td>{{$project->describe}}</td>
                                @if(Auth::check())
                                    <td>
                                      <div class="form-group">                                          
                                        <form action="{{url('projects/'.$project->id)}}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn xóa dự án không?')">
                                            Xóa
                                        </button>
                                        </form>
                                        </div>
                                    </td>
                                @endif
    	        			</tr>
    					@endforeach
            		</tbody>
            	</table>
            @else
                <div class="panel-body">
                        <b>Không có dự án nào</b> 
                </div>
            @endif
        </div>  
	</div>
@endsection
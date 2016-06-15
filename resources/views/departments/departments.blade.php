@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::check())
        <div class="panel-body" style="font-family: time new roman;">
            <h1 style="color:red;"; align="center">Trang quản lý phòng ban</h1>
        </div>  
            
        <a href="{{ url('departments/create') }}" class='btn btn-success btn-lg' role='button'> <i class="glyphicon glyphicon-plus"></i> Thêm phòng ban</a>
        <br>
        <br>
    @else
        <div class="panel-body" style="font-family: time new roman;">
            <h1 style="color:red;"; align="center">Danh sách phòng ban</h1>
        </div>
    @endif
            <div class="panel panel-primary">
                @if(count($departments) > 0)
                <table class="table table-hover">
                    <thead style="background: #337AB7; color:#fff;">
                    <tr>
                         <th>Tên phòng ban</th>
                         <th>Mã phòng ban</th>
                         <th>Quản lý</th>
                         <th>Thao tác</th>
                     </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr class="td">
                            <td><a href="{{url('departments/'.$department->id)}}">{{$department->name}}</a></td>
                            <td>{{$department->office_number}}</td>
                            <td>{{$department->manager}}</td>
                            <td>
                            @if(Auth::check())
                                    <form action="{{url('departments/'.$department->id)}}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <a href="{{url('employees/search?name=&department_id='.$department->id)}}" class='btn btn-info btn-xs' >Nhân viên</a>
                                        <a href="{{url('departments/'.$department->id.'/edit')}}" class="btn btn-info btn-xs">
                                             <span class="glyphicon glyphicon-pencil">Sửa
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn xóa phòng ban không?')">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            @else
                                <a href="{{url('employees/search?name=&department_id='.$department->id)}}" class='btn btn-info btn-xs' >Nhân viên</a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <div class="panel-body">
                        <b>Không có phòng ban nào</b> 
                    </div>
                @endif
            </div>

</div>
@endsection

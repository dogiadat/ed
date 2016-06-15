@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px; background-color:#fff;">Thêm phòng ban</div>
                <div class="panel-body">
                    @if($errors->any())
                        <ul class="errors">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    @endif
                    <form action="{{url('departments')}}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label name="name">Tên phòng ban: </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label name="office_number">Số phòng: </label>
                            <input type="text" name="office_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label name="manager">Quản lý: </label>
                            <input type="text" name="manager" class="form-control">
                        </div>
                        <div class="form-group" align="center"><button type="submit" class="btn btn-success">Thêm phòng ban</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

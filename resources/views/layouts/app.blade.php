<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Employee Directory</title>
    
    <link rel="icon" href="{{ asset('img/employeedirectory.png') }}">
    <!-- Fonts -->
    <link href="{{asset('css/font/lato.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('css/font/font-awesome.min.css')}}" rel='stylesheet' type='text/css'>

    <link href="{{asset('css/lib/bootstrap.min.css')}}" rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
<!--     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->


</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Employee Directory
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/employees') }}">Nhân viên</a></li>
                    <li><a href="{{ url('/departments') }}">Phòng ban</a></li>
                    <li><a href="{{ url('projects') }}">Dự án</a></li>


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="#" data-toggle="modal" data-target="#modalLogin">Đăng nhập</a></li>
                    <li><a href="{{ url('/register') }}">Đăng ký</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Đăng xuất</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Model Login begin -->

    <!-- Model Login end -->

    <div id="wrap">
        @yield('content')
    </div>
    <footer>
        <div class="footer text-center">
            Đỗ Gia Đạt - Nguyễn Ngọc Quang - 2016
        </div>
    </footer>
    <!-- JavaScripts -->
    <script src="{{asset('js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/myScript.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <div class="modal fade" id="modalLogin"  role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" >×</button>
                        <h4 class="modal-title" id="myModalLabel">Đăng nhập hệ thống</h4>
                    </div> <!-- /.modal-header -->

                    <div class="modal-body">


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <input type="text" class="form-control" id="uLogin" name="email" placeholder="Email">
                                @if (!$errors->has('email'))
                                <label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
                                @endif
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <input type="password" class="form-control" id="uPassword" name="password" placeholder="Mật khẩu">
                                
                                @if (!$errors->has('password'))
                                <label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
                                @endif
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div> <!-- /.input-group -->
                        </div> <!-- /.form-group -->

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                            </label>
                        </div> <!-- /.checkbox -->


                    </div> <!-- /.modal-body -->

                    <div class="modal-footer">
                    <button type="submit" class="form-control btn btn-primary">Đăng nhập</button>
                    </div> <!-- /.modal-footer -->
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </body>
    </html>

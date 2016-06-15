<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            label {
                padding: 10px;
            }
            form {
                background: #f5f5f5;
                padding: 20px;
                border-radius: 10px;
            }
            input[type='submit']{
                background: #0098cb;
                border-radius: 5px;
                color:#fff;
                padding: 10px;
                margin: 20px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                {{ Form::open( [ 'url' => 'upload/result', 'method' => 'post', 'files' => true ] ) }}
                    <label>Select image to upload</label>
                    {!! Form::file('file') !!}
                    <input type="submit" value='Upload' name='submit'>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                {{ Form::close() }}
            </div>
        </div>
    </body>
</html>

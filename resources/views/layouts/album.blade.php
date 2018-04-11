<!DOCTYPE html>
<html lang="en">

<head>
    <title>LARAVEL PRACTICE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    @include('inc.navbar')
    <div class = "container" id = "maincontent">
        @if(Request::is('/'))
        @include('inc.showcase')
        @endif
        <div class = "row">
            <div class = "col-md-8 col-lg-12">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
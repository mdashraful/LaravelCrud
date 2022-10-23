<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>{{config('app.name')}}</title>
</head>
<body>
    <div class="container">
        <div class="top_bar">
            <div class="logo">
                <p><a href="{{route('student.index')}}">CRUD</a></p>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="{{route('student.index')}}" style="background-color: #3498DB ">All</a></li>
                    <li><a href="{{url('/student/create')}}" style="background-color:  #4CAF50">Add New</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            @yield('data')
        </div>
    </div>
</body>
</html>
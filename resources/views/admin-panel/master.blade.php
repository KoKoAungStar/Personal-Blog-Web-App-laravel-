<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    Bootstrap css--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{--    custom css--}}
    <style>
        .sidenav{
            width: 200px;
            height: 100%;
            background-color: black;
            position: fixed;
            padding: 15px;
        }
        .sidenav a{
            display: block;
            padding: 10px;
            font-size: 1.4rem;
            text-decoration: none;
            color:white;
            padding: 5px;
        }
        .main{
            margin-left: 200px;
            font-size: 18px;
            padding: 20px;
        }
        .mainCol{
            padding: 0px;
        }
        .navbar{
            position: fixed;
            top: 0;
            z-index: 5;
        }
    </style>
    <title>@yield('title')</title>
    {{--    font-awesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mainCol">
            {{--                navigation--}}
            <nav class="navbar navbar-expand-lg navbar-light bg-dark position-sticky">
                <a class="navbar-brand text-white" href="{{ url('admin/dashboard')}}">Personal Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                {{ \Illuminate\Support\Facades\Auth::user()->name}}                                </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" onclick='return confirm("Are you sure you want to logout?")'>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            {{--                sidebar menu--}}
            <div class="sidenav">
                <a href="{{ url('admin/users') }}">Users</a>
                <a href="{{ url('admin/skills') }}">Skills</a>
                <a href="{{ route('projects.index')  }}">Project</a>
                <a href="{{ route('student-counts.index') }}">Student Count</a>
                <a href="{{ url('admin/categories')}}">Category</a>
                <a href="{{ url('admin/posts')}}">Post</a>
            </div>
            {{--                main content--}}
            <div class="main">
                @yield('content')
            </div>
        </div>
    </div>
</div>


{{--Bootstrap js--}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@yield('javascript')
</body>
</html>

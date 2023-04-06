<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BBC Cartel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{route('home')}}">BBC Cartel</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('images')}}">Foto's</a>
                    </li>
                    @if(Session::get('user'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('images.create')}}">Foto uploaden</a>
                        </li>
                    @endif
                </ul>
                @if(!Session::get('user'))
                    <div class="d-flex gap-2">
                        <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                        <a href="{{route('register')}}" class="btn btn-dark">Register</a>
                    </div>
                @else
                    <div class="d-flex align-items-center gap-2">
                        <div class="dropdown d-flex gap-2 align-items-center">
                            <span class="text-white">{{Session::get('user')->name}}</span>
                            <img src="{{asset('assets/images/') . '/' . Session::get('user')->profile_picture}}"
                                 height="50" width="50" class="object-fit-cover rounded-circle" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{route('settings')}}">Instellingen</a></li>
                                <li><a class="dropdown-item" href="{{route('logout')}}">Loguit</a></li>
                            </ul>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </nav>
    <img src="{{asset('assets/images/background.png')}}" class="background-image" alt="">
    @if($message = Session::get('error'))
        <div class="alert alert-danger">
            <h5 class="text-danger">{{$message}}</h5>
        </div>
        <br>
    @endif
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <h5 class="text-success">{{$message}}</h5>
        </div>
    @endif
    {{$slot}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
{{--    <script src="{{asset('js/script.js')}}"></script>--}}
</body>
</html>

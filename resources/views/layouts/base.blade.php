<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="crossorigin="anonymous"
        referrerpolicy="no-referrer" />
        <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        {{-- vite manifest --}}
        <link rel="stylesheet" type="text/css" href="resources/sass/app.scss">
        <link rel="stylesheet" href="{{asset('build/assets/app.4d7936ae.css')}}">

        <script src="{{asset('build/assets/app.2b9a524e.js')}}"></script>
        <script src="resources/js/app.js"></script>
        <script src="resources/js/bootstrap.js"></script>

        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

        <!-- Styles -->
        <style>
            *{
    padding: 0;
    margin: 0;
    scroll-behavior: smooth;
    
}
body{
    padding: 0;
    margin: 0;
    background-color: black;
    overflow-x: hidden;
}
.copyright{
    background-color: rgb(0, 0, 0);
    color: rgb(71, 67, 67);
}
.copyright-b{
    color: white;
}

.back-to-top {
    position: fixed;
    display: flex;
    background: rgb(175, 146, 73);
    color: rgb(19, 18, 18);
    width: 44px;
    padding: 10px 10px;
    height: 44px;
    text-align: center;
    line-height: 1;
    font-size: 16px;
    border-radius: 50%;
    right: 15px;
    bottom: 40px;
    transition: background 0.5s;
    z-index: 11;
}
.back-to-top:hover{
    background-color: black;
    color: white;
    
}
.navbar{
    background-color: black;
}
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        </style>
        @livewireStyles
    </head>
    <body style="background-color: black;">
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{route('/')}}">
                    <img src="{{asset("assets/images/B' Primera Studios LOGO2.jpg")}}" width="100px" alt="logo">
                </a>
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"
                    id="navbarSupportedContent">
                    {{-- @livewire('header-search-component') --}}
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                                href="{{route('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" aria-current="page"
                                href="{{route('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Services</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                                id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark"
                                aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('photo')}}"><i class="fa fa-image"></i> Photo</a></li>
                                {{-- <li><a class="dropdown-item" href="#"><i class="fa fa-video-camera"></i> Video</a></li> --}}
                            </ul>
                        </li>
                        @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->user_type === 'ADM')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    My Account ({{Auth::user()->name}})
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('admin.categories')}}"><i class="fa fa-tachometer"></i> Category</a></li>
                                    <li><a class="dropdown-item" href="{{route('admin.photos')}}"><i class="fa fa-image"></i> Photo</a></li>
                                    {{-- <li><a class="dropdown-item" href=""><i class="fa fa-video-camera"></i> Video</a></li> --}}
                                    <li><a class="dropdown-item" href="{{route('admin.collages')}}"> <i class="fa fa-camera"></i> Collage</a></li>
                                    <li><a class="dropdown-item" href="{{route('admin.slides')}}"><i class="fa fa-users"></i> Slide</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="ml-4"><i class="fa fa-sign-out"></i> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </li>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf
            
                                    </form>
            
                                </ul>
                            </li>
                            @endif
                        @endauth
                    @endif
                    </ul>
                </div>
            </div>
        </nav>

        {{$slot}}

        <div class="whatsapp-chat">
            <a href="https://wa.me/+2348122232325?text=I'm%20interested%20in%20your%20service" target="_blank">
                <img src="{{ asset('assets/images/whatsapp.png') }}" width="60px" height="60px" class="m-2"
                    alt="">
            </a>
        </div>

        <div class="footer py-5 text-light" style="background-color: black" data-aos="flip-up"
        data-aos-duration="2000">
        <div class="card" style="background-color: black">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <h4 class="mt-3" style="color: rgb(175, 146,
                                73);"><strong>B'PRIMERA STUDIO</strong></h4><hr>
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ut fugit nisi adipisci
                            exercitationem magni veniam asperiores quae
                            dolorum doloribus impedit esse, officiis
                            deserunt, repellat mollitia quo optio quos cum
                            debitis?
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <h4 class="mt-3"><strong>Services</strong></h4><hr>
                            <p><i class="fa fa-camera"></i> Photography</p>
                            <p><i class="fa fa-video-camera"></i>
                                Videography</p>
                            <p><i class="fa fa-camera"></i> Event Coverage</p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <h4 class="mt-3"><strong>Links</strong></h4><hr>
                            <a href="" style="text-decoration: none; color:
                                white;"><i class="fa fa-angle-double-right"></i>
                                Home</a><br><br>
                            <a href="" style="text-decoration: none; color:
                                white;"><i class="fa fa-angle-double-right"></i>
                                About</a><br><br>
                            <a href="" style="text-decoration: none; color:
                                white;"><i class="fa fa-angle-double-right"></i>
                                Photo</a><br><br>
                            <a href="" style="text-decoration: none; color:
                                white;"><i class="fa fa-angle-double-right"></i>
                                Video</a><br>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <h4 class="mt-3"><strong>Contacts</strong></h4><hr>
                            <p><i class="fa fa-home"></i> No 15, Akpoga
                                Plaza, Obollo-Afor</p>
                            <p><i class="fa fa-envelope"></i>
                                b'primera@gmail.com</p>
                            <p><i class="fa fa-phone"></i> +234 8122232325</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="socials d-flex mt-4 me-auto ms-auto">
                <a href="" class="me-3 ms-3" target="_blank"><ion-icon
                        name="logo-facebook"></ion-icon> </a><br>
                <a href="" class="me-3 ms-3" target="_blank"><ion-icon
                        name="logo-twitter"></ion-icon> </a><br>
                <a href="" class="me-3 ms-3" target="_blank"><ion-icon
                        name="logo-instagram"></ion-icon> </a><br>
            </div>
        </div>
    </div>
    <div class="copyright p-3 text-center">
        &copy; 2022 Copyright: <span class="copyright-b">B'Primerastudio.com</span>
    </div>
    <div onclick="scrollToTop()" class="back-to-top">Top</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="assets/js/jquery/jquery.min.js"></script>     --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <script src="assets/js/owl.carousel.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}
        
            @livewireScripts
            @stack('scripts')
    </body>
</html>

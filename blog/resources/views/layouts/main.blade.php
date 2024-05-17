<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transbaikal Tourism</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap_carusel.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/loader.js')}}"></script>
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('main.index') }}"><img src="{{ asset('assets/images/TRANSBAIKAL_TOURISM_purple.svg')}}" alt="Edica"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main.index') }}">Достопримечательности</a>
                        </li>

                        {{-- <li class="nav-item">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input>
                        </li> --}}

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                            <div class="dropdown-menu" aria-labelledby="blogDropdown">
                                @foreach ($categoriess as $category)
                                    <a class="dropdown-item" href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a>
                                @endforeach
                            </div>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Районы</a>
                            <div class="dropdown-menu" aria-labelledby="blogDropdown">
                                @php
                                    $uniqueValues = $districtss->unique();
                                @endphp

                                @foreach ($uniqueValues as $value)
                                    <a class="dropdown-item" href="{{ route('district.post.index', ['district' => $value]) }}">{{ $value }}</a>
                                @endforeach
                            </div>
                        </li>
{{--
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('district.index') }}">Районы</a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('group.index') }}">Группы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('search.index') }}">Поиск</a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('person.main.index') }}">Личный кабинет</a>
                            </li>
                            {{-- @if ($role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.main.index') }}">Админка</a>
                                </li>
                            @endif --}}
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('person.main.index') }}">Выйти</a> --}}
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="nav-link" type="submit">Выйти</button>
                                </form>
                            </li>

                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('person.main.index') }}">Войти</a>
                            </li>
                        @endguest

                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')


    {{-- <footer class="edica-footer" data-aos="fade-up"> --}}
    <footer class="edica-footer">
        <div class="container">
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <a href="index.html" class="footer-brand-wrapper">
                        <img src="{{ asset('assets/images/TRAVEL_purple.svg')}}" alt="edica logo">
                    </a>
                    <p class="contact-details">почта</p>
                    <p class="contact-details">телефон</p>
                    <nav class="footer-social-links">
                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a href="#!"><i class="fab fa-twitter"></i></a>
                        <a href="#!"><i class="fab fa-behance"></i></a>
                        <a href="#!"><i class="fab fa-dribbble"></i></a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="footer-nav">
                        <a href="#!" class="nav-link">Партнеры</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="footer-nav">
                        <a href="#!" class="nav-link">FAQ</a>
                    </nav>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="footer-bottom-content">
                <nav class="nav footer-bottom-nav">
                    <a href="#!">Приватность & Политика</a>
                    <a href="#!">Условия</a>
                </nav>
                <p class="mb-0">© Travel. 2024 <a href="#" target="_blank" rel="noopener noreferrer" class="text-reset"></a> . All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"> --}}
    <script src="https://kit.fontawesome.com/b28275dfc4.js" crossorigin="anonymous"></script>
    // <script type="text/javascript">
    //     var route = "{{url('users/search')}}";
    //     $('#users').typeahead({
    //         source: function(query, process) {
    //         return $.get(route, {
    //             query: query
    //         }, function(data) {
    //             return process(data);
    //         });
    //         }
    //     });
    // </script>
    // <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>

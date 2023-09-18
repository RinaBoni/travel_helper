<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset = UTF-8"/>
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>Вход</title>
    </head>

    <body>

        <form method="POST" action="{{route('registration')}}">
            @csrf
            <div >

                <h1 >Регистрация</h1>

                <div>

                    <div>
                        <input  type="text" id="name" name="name" placeholder="Логин">
                    </div>

                    <div>
                        <input  type="text" name="email" placeholder="Почта">

                    <div>
                        <input  type="password" name="password" placeholder="Пароль">
                    </div>

                    <div>
                        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">

                    </div>

                </div>
                <div>
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                </div>
                <div  >
                    <button type="submit" >Регистрация</button>
                </div>

            </div>

        </form>
    </body>
</html>











{{-- @extends('layout.layout')
@section('title','App | Login')
@vite(['resources/scss/app.scss', 'resources/js/auth/app.js'])

@section('content')
    <div id="app"></div>
@endsection --}}

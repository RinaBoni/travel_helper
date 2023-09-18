<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset = UTF-8"/>
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>Вход</title>
    </head>

    <body>

        <form method="POST" action="{{route('login')}}">
            @csrf
            <div >

                <h1 >Вход</h1>

                <div>

                    <div>
                        <input  type="text" name="email" placeholder="Почта">
                        {{-- @error()
                            <div>{{$message}}</div>
                        @enderror --}}
                    </div>

                    <div>
                        <input  type="password" name="password" placeholder="Пароль">
                        {{-- @error()
                            <div>{{$message}}</div>
                        @enderror --}}
                    </div>

                </div>

                <div  >
                    <button type="submit" >Вход</button>
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

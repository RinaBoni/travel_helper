<!DOCTYPE html>
<html lang = "ru">

    <head>
        <meta http-equiv="Content-type" content="text/html; charset = UTF-8"/>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

        <title>
            Регистрация
        </title>

    </head>

    <body>
        <header class="header">
            <div class="container">
                <div class="header_inner">

                    <div class="header_logo">Travel helper</div>

                    <nav class="nav">
                        <a class="nav_link" href="">Вход</a>
                    </nav>

                </div>
            </div>
        </header>

        <main>
            <form action="{{route('register')}}" method="post">
                @csrf{{--токен для валидации--}}
                <div class="circle"></div>

                <div class="reg_container">
                    <h1 class="reg_title">Регистрация</h1>

                    <div class="reg_fields">
                        <div class="field">
                            <input class="reg_field_input" type="text" name="login" placeholder="Логин">
                        </div>
                        <div class="field">
                            <input class="reg_field_input" type="text" name="email" placeholder="Почта">
                        </div>
                        <div class="field">
                            <input class="reg_field_input" type="password" name="password" placeholder="Пароль">
                        </div>
                        <div class="field">
                            <input class="reg_field_input" type="password" name="password_confirm" placeholder="Подтвердить пароль">
                        </div>
                    </div>  <!--reg_fields -->

                    <div class="reg_buttons" >
                        <button type="submit" class="butt">Регистрация</button>
                    </div>  <!--reg_button -->
                    <a class="nav_link" href="{{route('dashboard')}}">Регистрация</a>

                </div>  <!--reg_container -->
            </form>
        </main>
    </body>


</html>

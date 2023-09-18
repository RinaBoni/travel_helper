<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request){

        //если пользователь уже авторизирован, отправляем его на страницу открытую для зарегистрированных пользователей
        if(Auth::check()){
            return redirect(route('welcome'));
        }

        $fromFields = $request->only(['email', 'password']);

        if(Auth::attempt($fromFields)){
            return redirect()->intended(route('welcome'));
        }

        return redirect(route('login'))->withErrors([
            'formError'=>'Произошла ошибка при ауентификации'
        ]);
    }
}

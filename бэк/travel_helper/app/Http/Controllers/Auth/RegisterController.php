<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        //если пользователь уже авторизирован, отправляем его на страницу открытую для зарегистрированных пользователей
        if(Auth::check()){
            return redirect(route('welcome'));
        }

        //проверяем правильность заполнения формы
        $validateFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()],
            /* 'password' => ['required', 'string', 'confirmed', Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()], */
        ]);


        if(User::where('email', $validateFields['email'])->exists()){
            return redirect(route('registration'))->withErrors([
                'email'=>'Пользователь с такой почтой уже существует'
            ]);
        }

        //записываем пользователя в бд и отправляем его на страницу открытую для зарегистрированных пользователей
        //если пользователь не сохранился, отправляем его на форму регистрации с ошибкой
        $user = User::create($validateFields);
        if($user){
            auth()->login($user);
            return redirect(route('welcome'));
        }
        return redirect(route('registration'))->withErrors([
            'formError'=>'Произошла ошибка при сохранении пользователя'
        ]);

    }


//     public function create()
//     {
//         return view('auth.register');
//     }

//     public function store(Request $request)
//     {
// //        создаем пользователя
//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);

// //        после создания пользователя мы можем его аутентифицировать
//         Auth::login($user);

// //        отправляем пользователя на главную страницу
//         return redirect('/dashboard');
//     }
}

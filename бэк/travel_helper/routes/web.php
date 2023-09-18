<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Web\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//
//Route::get('/', [IndexController::class, 'index'])->name('web.index');
//Route::get('/login', [IndexController::class, 'login'])->name('web.login');
//
//Route::group(['middleware' => 'auth'], static function () {
//    Route::get('/app', [IndexController::class, 'app'])->name('web.app');
//    Route::get('/app/{any}', [IndexController::class, 'app'])->where('any', '.*')->name('web.app.all');
//});




Route::view('/','welcome')->name('welcome');



Route::view('/private','private')->middleware('auth')->name('private');

//если пользователь ауентифицирован, пересылаем его на страницу велком
//если не ауентифицирован, отправляем на страницу входа
Route::get('/login', function(){
    if(Auth::check()){
        return redirect(route('private'));
    }
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

//разлогиненваем пользователя и отправляем на велком
Route::get('/logout',function(){
    Auth::logout();
    return redirect('welcome');
})->name('logout');

//если пользователь зарегистрирован, пересылаем его на страницу велком
//если не зарегистрирован, отправляем на страницу регистрации
Route::get('/registration', function(){
    if(Auth::check()){
        return redirect(route('welcome'));
    }
    return view('auth.registration');
})->name('registration');

//при отправке формы в классе RegisterController используем метод save
Route::post('/registration',[RegisterController::class, 'save']);





// Route::get('/register',[RegisterController::class, 'create'])->middleware('guest')->name('register');
// Route::post('/register',[RegisterController::class, 'create'])->middleware('guest');



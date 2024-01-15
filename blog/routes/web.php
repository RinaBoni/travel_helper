<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Person\CommentController;
use App\Http\Controllers\Person\LikedController;
use App\Http\Controllers\Person\PersonIndexController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Auth::routes(['verification.verify' => true]);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::group(['namespace' => 'Main'], function(){
    Route::get('/', [IndexController::class, '__invoke']);
});



Route::group(['namespace' => 'Main'], function(){
    Route::get('/', [IndexController::class, '__invoke']);
});



Route::group(['namespace' => 'Person', 'prefix' => 'person', 'middleware' => ['auth', 'verified']], function(){
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/', [PersonIndexController::class, 'index'])->name('person.main.index');
    });


    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function(){
        Route::get('/', [LikedController::class, 'index'])->name('person.liked.index');
        Route::delete('/{post}', [LikedController::class, 'delete'])->name('person.liked.delete');
    });


    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function(){
        Route::get('/', [CommentController::class, 'index'])->name('person.comment.index');
        Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('person.comment.edit');
        Route::patch('/{comment}', [CommentController::class, 'update'])->name('person.comment.update');
        Route::delete('/{comment}', [CommentController::class, 'delete'])->name('person.comment.delete');
    });
});



//префикс будет автоматически подставляться в ссылку перед/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function(){
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/', [AdminIndexController::class, '__invoke'])->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function(){
        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('admin.post.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::patch('/{post}', [PostController::class, 'update'])->name('admin.post.update');
        Route::delete('/{post}', [PostController::class, 'delete'])->name('admin.post.delete');
    });



    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });


    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function(){
        Route::get('/', [TagController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [TagController::class, 'create'])->name('admin.tag.create');
        Route::post('/', [TagController::class, 'store'])->name('admin.tag.store');
        Route::get('/{tag}', [TagController::class, 'show'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
        Route::patch('/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag}', [TagController::class, 'delete'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

});

require __DIR__.'/auth.php';

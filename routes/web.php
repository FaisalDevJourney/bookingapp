<?php

use App\Http\Controllers\courseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post("/register", [userController::class, 'register']);
Route::post("/login", [userController::class, 'login']);
Route::get("/show", [userController::class, 'show']);
Route::get("/courses", [courseController::class, 'getCourses']);
Route::post("/topup", [userController::class, 'topup']);
Route::get("/topup", function(){
    return view('topup');
});
Route::get("/logout", function(){
    Auth::logout();
    return view('home');
});

Route::post('/addcourse', [courseController::class,"addcourse"]);

Route::get('/addcourse', function(){
    if(Auth::user()->role == "instructor"){
        return view("addcourse");
    }else{
        return view("home");
    }
});



Route::get("login", function(){
    if(auth()->check()){
        return view('home');
    }else{
        return view('login');
    }
});

Route::get("register", function(){
    if(auth()->check()){
        return view('home');
    }else{
        return view('register');
    }
});

Route::get('/buy/{id}/{price}', [courseController::class, 'buycourse']);
Route::get('/prev/{id}', [courseController::class, 'preview']);
Route::get('/edit/{id}', [courseController::class, 'editpreview']);
Route::get('/download/{name}', [courseController::class, 'download']);
Route::post('/edit/{id}', [courseController::class, 'editcourse']);
Route::post('/deleteimg/{id}', [courseController::class, 'deleteimg']);
Route::post('/document/{id}', [courseController::class, 'uploadfiles']);
Route::view('/mycourses', [courseController::class, 'mycourses']);

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', function(){
    if(session()->has('userid')){
        return redirect('dashboardval');
    }
    return view('register');
});

Route::post('store', 'Usersregister@store');

Route::get('login', function(){
    if(session()->has('userid')){
        return redirect('dashboardval');
    }
    return view('login');
});

Route::post('logs', 'Userslogin@logs');

Route::get('dashboard', function(){
    if(session()->has('userid')){
        return redirect('dashboardval');
    }
    return view('login');
});
Route::get('dashboardval', 'Usercontroller@dashboardval');

Route::get('/logout', function(){
    if(session()->has('userid')){
        session()->pull('userid');  
    }
    return redirect('login');
});

Route::get('editprofile', function(){
    if(session()->has('userid')){
        return redirect('editval');
    }
    return view('login');
});

Route::get('editval', 'Usersedit@editval');

Route::post('edituser', 'Usersedit@edituser');
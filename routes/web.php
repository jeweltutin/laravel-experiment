<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/user', function(){
    //factory(\App\Models\User::class, 3)->create();
    //\App\Models\User::factory()->count(3)->create(); 

    /* \App\Models\Address::create([
        'user_id' => 1,
        'city' => 'Dhaka',
        'country' => 'Bangladesh',
    ]);
    \App\Models\Address::create([
        'user_id' => 2,
        'city' => 'Mumbai',
        'country' => 'India',
    ]);
    \App\Models\Address::create([
        'user_id' => 3,
        'city' => 'Colombo',
        'country' => 'Srilanka'
    ]); */

    $users = \App\Models\User::all();
    return view('users.index', compact('users'));

});

Route::get('/users', [UserController::class, 'index'])->name('user');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

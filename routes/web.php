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
    //factory(\App\Models\User::class, 3)->create();   //This will not work in laravel 8

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

    /*$user = \App\Models\User::factory()->create();

    $address = new \App\Models\Address([
        'city' => 'Barisal',
        'country' => 'Bangladesh'
    ]);
    $address->owner()->associate($user);
    $address->save();*/

    /*\App\Models\Address::create([ // uid error showing
        'uid' => $user->id,
        'city' => 'Rajshahi',
        'country' => 'Bangladesh'
    ]);*/
    /* $user->address()->create([   //This works fine
        'city' => 'Khulna',
        'country' => 'Bangladesh'
    ]); */

    //$users = \App\Models\User::all();
    //return view('users.index', compact('users'));

    //$addresses = App\Models\Address::all();
    //$addresses = App\Models\Address::with('owner')->get();
    
    //return view('users.index', compact('addresses'));

    //$users = \App\Models\User::with('addresses')->get();

    /* $users[0]->addresses()->create([
        'city' => 'Kathmundu',
        'country' => 'Nepal'
    ]); */

    //dd($users[0]);

    $users = \App\Models\User::with('posts')->get();
    //$users = \App\Models\User::has('posts')->with('posts')->get();
    //$users = \App\Models\User::has('posts', '>=', 2 )->with('posts')->get();
    /* $users = \App\Models\User::whereHas('posts', function($query){
        $query->where('title', 'like', '%new%');
    })->with('posts')->get(); */
    //$users = \App\Models\User::doesntHave('posts')->with('posts')->get();


    /* $users[0]->posts()->create([
        'title' => 'New post One',
        'post' => "I know, thist question has been discussed already in this forum. But sorry, i just don't get it. Maybe the problem is, that EN is not my native language."
    ]);
    $users[2]->posts()->create([
        'title' => 'New post Two',
        'post' => "I know, thist question has been discussed already in this forum. But sorry, i just don't get it. Maybe the problem is, that EN is not my native language."
    ]); */
    return view('users.index', compact('users'));

});

Route::get('/users', [UserController::class, 'index'])->name('user');

Auth::routes();

Route::get('/posts', function(){
    /* \App\Models\Post::create([ 
        'user_id' => 1,
        'title' => 'This is first post',
        'post' => "I know, thist question has been discussed already in this forum. But sorry, i just don't get it. Maybe the problem is, that EN is not my native language."
    ]);
    \App\Models\Post::create([ 
        'user_id' => 2,
        'title' => 'This is Second post',
        'post' => "I know, thist question has been discussed already in this forum. But sorry, i just don't get it. Maybe the problem is, that EN is not my native language."
    ]); 
    \App\Models\Post::create([ 
        'title' => 'This is Third post',
        'post' => "I know, thist question has been discussed already in this forum. But sorry, i just don't get it. Maybe the problem is, that EN is not my native language."
    ]);*/

    //$posts =  \App\Models\Post::get();

    //dd($posts[2]->user_id); 
    //return view('posts.index',compact('posts'));

    /* \App\Models\Tag::create([
        'name' => 'Laravel'
    ]);
    \App\Models\Tag::create([
        'name' => 'PHP'
    ]);
    \App\Models\Tag::create([
        'name' => 'Javascript'
    ]);
    \App\Models\Tag::create([
        'name' => 'VueJS'
    ]); */

    //$tag = \App\Models\Tag::first();
    $post = \App\Models\Post::with('tags')->first();

    //$post->tags()->attach($tag);
    //$post->tags()->attach([2,3,4]);
    //$post->tags()->detach([2]);

    //$post->tags()->detach();
    //$post->tags()->attach([2,3]);
    //OR
    $post->tags()->sync([1,4]);


    //dd($post);

    $posts = \App\Models\Post::with(['myuser', 'tags'])->get();
    return view('posts.index',compact('posts'));
});

Route::get('/tags', function(){
    $tags = \App\Models\Tag::with('posts')->get();
    return view('tags.index',compact('tags'));
});

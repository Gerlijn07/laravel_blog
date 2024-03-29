<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts', [
        'posts' => Post::all()
    ]);
});


Route::get('posts/{post}', function ($slug) {
    return view('post', [
        'post' => Post::find($slug)
    ]);
/*
    $path = __DIR__ . "/../resources/posts/{$slug}.html";


    // $post = file_get_contents($path);
    $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
   
    return view('post', ['post' => $post]);
    */
})->where('post', '[A-z_\-]+');

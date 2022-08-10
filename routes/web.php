<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;

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
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/tentang', function () {
    return view('tentang', [
        'title' => 'Tentang',
        'active' => 'tentang',
        'name' => 'Rahmad',
        'email' => 'rahmad.looker@gmail.com',
        'image' => 'assets/img/buffon.jpg'

    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/bangameck', function () {
    return 'bangameck.dev';
});

//halaman single post

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all(),
        'no' => '1',
        'not_found' => request('search')
    ]);
});

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'title' => "Post by $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load(['author', 'category']),
//         'not_found' => request('search')
//     ]);
// });

// Route::get('/author' , function() {
//     return view('authors' , [
//         'title' => 'Author List',
//         'posts' => Post::all(),
//         'authors' => User::all(),
//         'category' => Category::all(),
//         'no' => '1',

//     ]);
// });

// Route::get('/author/{author:username}', function(User $author) {
//     return view('posts', [
//         'title' => "Post By $author->name",
//         'active' => 'author',
//         'posts' => $author->posts->load(['category','author']),
//         'not_found' => request('search')


//     ]);
// });
//Login Routes
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Register Routes
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//Dashboard
Route::get('/dashboard', function () {
    return view('dash.index', [
        'title' => 'Dashboard',
        'active' => 'dashboard'
    ]);
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\MustBeAdmin;
use App\Mail\TestEmail;
use App\Models\User;
use App\Notifications\TestNotification;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/',[HomeController::class,'index'])->name('index')->middleware('auth');
Route::get('/post/create',[HomeController::class,'post'])->name('post.create')->middleware('auth');
Route::post('post/save/',[PostController::class,'save'])->name('post.save');
Route::get('/post/{slug}',[PostController::class,'read'])->name('post.show');
Route::get('/user/dashboard',[HomeController::class,'dashboard'] )->name('user.dashboard');

Route::get('/ebook/create',[EbookController::class,'create'])->name('ebook.add');
Route::post('/ebook/save',[EbookController::class,'save'])->name('ebook.save');
Route::get('/ebook',[EbookController::class,'display'])->name('ebook.display');
Route::get('/ebook/read/{id}',[EbookController::class,'read'])->name('ebook.read');

Route::post('/post/comment/{id}',[CommentController::class,'post'])->name('post.comment');
Route::post('/ebook/comment/{id}',[CommentController::class,'ebook'])->name('ebook.comment');

Route::get('/posts/manage',[PostController::class,'manage'])->name('posts.manage');
Route::get('/post/edit/{id}',[PostController::class,'display'])->name('post.edit');
Route::post('/post/update/{id}',[PostController::class,'update'])->name('post.update');
Route::get('/post/delete/{id}',[PostController::class,'delete'])->name('post.delete');

Route::get('/ebooks/manage',[EbookController::class,'manage'])->name('ebooks.manage');
Route::get('/ebook/edit/{id}',[EbookController::class,'edit'])->name('ebook.edit');
Route::get('/ebook/delete/{id}',[EbookController::class,'delete'])->name('ebook.delete');
Route::post('/ebook/update/{id}',[EbookController::class,'update'])->name('ebook.update');

Route::get('/notification',function(){
    Notification::send(User::all(),new TestNotification());
    return('success');
});

Route::get('/testmail',function(){
    $name = "Duck";
    Mail::to('d04bd1b134-4df0b6+1@inbox.mailtrap.io')->send(new TestEmail($name));
    // Mail::send(new TestEmail($name)); // to use this method define mail_to in the config   
});

Route::get('testpage', [HomeController::class,'testpage'])->name('testpage');
Route::post('send/email',[HomeController::class,'emailArtisan'])->name("emai.artisan");
Route::get('testNotification',[HomeController::class,'testNotification'])->name('testNotification');
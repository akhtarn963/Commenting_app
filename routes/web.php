<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/feed-back', [FeedBackController::class, 'index'])->name('feed-back');
Route::post('/feed-back', [FeedBackController::class, 'addFeedBack'])->name('add-feed-back');
Route::get('/feed-back-detail/{id}', [FeedBackController::class, 'FeedBackDetail'])->name('feed-back-detail');
Route::post('/add-comment', [CommentController::class, 'addComment'])->name('add-comment');
/* admin routes */
Route::middleware('auth:admin')->group(function () {
Route::get('/admin/dashboard',function(){
    return view('admin');
});
Route::get('/admin/users-list', [UserController::class, 'usersList'])->name('user-list');
Route::get('/admin/delete-user/{id}', [UserController::class, 'deletUser'])->name('delete-user');
Route::get('/admin/feed-back-list', [FeedBackController::class, 'listing'])->name('feed-back-list');
Route::get('/admin/delete-feed-back/{id}', [FeedBackController::class, 'deletFeedBack'])->name('delete-feed-back');
Route::get('/admin/comments', [CommentController::class, 'commentList'])->name('comment-list');
Route::post('/admin/update_status', [CommentController::class, 'updateStatus']);

});
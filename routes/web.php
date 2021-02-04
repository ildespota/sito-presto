<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');

Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');

Route::get('/announcement/show/{announcement}', [HomeController::class, 'show'])->name('announcement.show');

Route::get('/announcement/category/{category}', [HomeController::class, 'showCategory'])->name('announcement.category');

Route::get('/revisor/home',[RevisorController::class, 'index'])->name('revisor.index');

Route::post('/revisor/announcement/{id}/accept',[RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject',[RevisorController::class, 'reject'])->name('revisor.reject');

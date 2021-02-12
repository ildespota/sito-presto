<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
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

Route::get('/announcement/show/{announcement}/{title}', [HomeController::class, 'show'])->name('announcement.show');

Route::get('/announcement/category/{category}', [HomeController::class, 'showCategory'])->name('announcement.category');

Route::get('/revisor/home',[RevisorController::class, 'index'])->name('revisor.index');

Route::post('/revisor/announcement/{id}/accept',[RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject',[RevisorController::class, 'reject'])->name('revisor.reject');

Route::get('/revisor/request',[MailController::class, 'create'])->name('revisor.create');
Route::post('/revisor/submit',[MailController::class, 'submit'])->name('revisor.submit');
Route::get('/revisor/trash',[RevisorController::class,'indexTrash'])->name('revisor.trash');
Route::put('/revisor/{id}/restore',[RevisorController::class,'restore'])->name('revisor.restore');
Route::get('/announcement/search',[HomeController::class,'search'])->name('announcement.search');

Route::get('/announcement/thankyou',[AnnouncementController::class,'thankyou'])->name('announcement.thankyou');
Route::get('/revisor/notallowed',[HomeController::class,'notallowed'])->name('revisor.notallowed');

Route::post('/announcement/images/upload',[AnnouncementController::class, 'uploadImage'])->name('announcement.images.upload');

Route::delete('/announcement/images/remove',[AnnouncementController::class,'removeImage'])->name('announcement.images.remove');
Route::get('/announcement/images',[AnnouncementController::class,'getImages'])->name('announcement.images');

Route::post('/locale/{locale}',[HomeController::class,'locale'])->name('locale');

Route::get('/user/permissions',[AdminController::class,'getPermissions'])->name('admin.permissions');
Route::put('/user/revisor/{id}', [AdminController::class, 'makeRevisor'])->name('make.revisor');
Route::put('/user/admin/{id}', [AdminController::class, 'makeAdmin'])->name('make.admin');
Route::put('/user/revisor/delete/{id}', [AdminController::class, 'cancelRevisor'])->name('cancel.revisor');
Route::put('/user/admin/delete/{id}', [AdminController::class, 'cancelAdmin'])->name('cancel.admin');

Route::delete('/announcement/{announcement}/destroy', [RevisorController::class, 'destroyAnnouncement'])->name('announcement.destroy');
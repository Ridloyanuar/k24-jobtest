<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function ($router) {

    Route::group(['middleware' => 'admin'], function ($router) {
        Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

        //user admin
        Route::get('/admin/user', [AdminController::class, 'dataUsers'])->name('admin.user');
        Route::get('/admin/user/add', [AdminController::class, 'addAdmin']);
        Route::post('/admin/user/added', [AdminController::class, 'adminAdded']);
        Route::get('/admin/user/{id}/edit', [AdminController::class, 'editAdmin']);
        Route::post('/admin/user/{id}/edited', [AdminController::class, 'adminEdited']);
        Route::get('/admin/user/{id}/deleted', [AdminController::class, 'adminDeleted']);

        //member
        Route::get('/admin/member', [AdminController::class, 'dataMembers']);
        Route::get('/admin/member/add', [AdminController::class, 'addMember']);
        Route::post('/admin/member/added', [AdminController::class, 'memberAdded']);
        Route::get('/admin/member/{id}/edit', [AdminController::class, 'editMember']);
        Route::post('/admin/member/{id}/edited', [AdminController::class, 'memberEdited']);
        Route::get('/admin/member/{id}/deleted', [AdminController::class, 'memberDeleted']);
        Route::get('/admin/member/list', [AdminController::class, 'dataMembersJson']);
    });

    Route::group(['middleware' => 'member'], function ($router) {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/profile/create', [App\Http\Controllers\HomeController::class, 'profilePanel']);
        Route::post('/profile/created', [App\Http\Controllers\HomeController::class, 'profileMember']);
        Route::get('/profile/edit', [App\Http\Controllers\HomeController::class, 'profileEdit']);
        Route::post('/profile/edited', [App\Http\Controllers\HomeController::class, 'profileEdited']);

    });
});
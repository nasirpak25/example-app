<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/createUser', [UserController::class, 'createUser'])->name('createUser');
Route::post('/createUser', [UserController::class, 'postCreateUser'])->name('postCreateUser');
Route::get('/readUsers', [UserController::class, 'readUsers'])->name('readUsers');
Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('editUser');
Route::put('/updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');
Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

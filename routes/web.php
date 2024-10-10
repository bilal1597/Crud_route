<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/users', [UserController::class, 'allUsers'])->name('ShowUsers');


Route::get('/add/users', [UserController::class, 'loadAddUser']);
Route::post('/add/users', [UserController::class, 'addUser'])->name('PostUser');


Route::get('/edit/{id}', [UserController::class, 'loadEditForm']);
Route::put('/edit/user', [UserController::class, 'editUser'])->name('EditUser');


Route::delete('/delete/{id}', [UserController::class, 'deleteUser'])->name('delete.User');

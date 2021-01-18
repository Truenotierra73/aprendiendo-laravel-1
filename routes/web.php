<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UsersController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

// DB::listen(function($query) {
//     echo "<pre>{ $query->sql }</pre>";
// });

Auth::routes();
Route::view('/', 'home')->name('home');

Route::resource('messages', MessagesController::class);
Route::resource('users', UsersController::class);

Route::get('roles', function () {
    $role = new Role;
    return $role->with('users')->get();
});

// Route::get('/mensajes/crear', [MessagesController::class, 'create'])->name('messages.create');
// Route::get('/mensajes', [MessagesController::class, 'index'])->name('messages.index');
// Route::post('/mensajes', [MessagesController::class, 'store'])->name('messages.store');
// Route::get('/mensajes/{id}', [MessagesController::class, 'show'])->name('messages.show');
// Route::put('/mensajes/{id}', [MessagesController::class, 'update'])->name('messages.update');
// Route::delete('/mensajes/{id}', [MessagesController::class, 'destroy'])->name('messages.destroy');
// Route::get('/mensajes/{id}/editar', [MessagesController::class, 'edit'])->name('messages.edit');

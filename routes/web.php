<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


//Login
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Register
Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Thank you
Route::view('/thank-you', 'thankyou')->name('thankyou');

Route::get('/contacts', 'ContactController@index')->middleware('auth');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index')->middleware('auth');
Route::get('/contacts/add', [ContactController::class, 'create'])->name('create.contact')->middleware('auth');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store')->middleware('auth');
Route::get('/contacts/search', [ContactController::class, 'showContacts'])->name('contacts.search')->middleware('auth');
Route::delete('/contacts/{id}', [ContactController::class, 'deleteContact'])->name('contacts.delete')->middleware('auth');

//Route::post('/contacts/add', [ContactController::class, 'create'])->name('create.contact');
//Route::post('/contacts/add', [ContactController::class, 'store'])->name('add.contact');
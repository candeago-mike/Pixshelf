<?php

use GuzzleHttp\Middleware;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonControleur;

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


Route::get('/',[MonControleur::class,'index'])->name('index');
Route::get('/login',[MonControleur::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[MonControleur::class,'dologin']); 

Route::get('/inscription', [MonControleur::class,'inscription'])->name('inscription');
Route::post('/register',[MonControleur::class,'register'])->name('register');

Route::get('/dashboard', [MonControleur::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/creation', [MonControleur::class,'creation'])->name('creation')->middleware('auth');
Route::post('/creationT', [MonControleur::class,'creationT'])->name('creationT')->middleware('auth');

Route::post('/ajout', [MonControleur::class,'ajout'])->name('ajout')->middleware('auth');

Route::get('/photos', [MonControleur::class,'photos'])->name('photos');

Route::get('/admin', [MonControleur::class,'admin'])->name('admin')->middleware(Admin::class);

Route::get('/logout', [MonControleur::class,'logout'])->name('logout');

Route::get('/albums', [MonControleur::class,'albums'])->name('albums');


Route::get('/supprimer/{id}',[MonControleur::class,'supprimer'])->name('supprimer')->middleware('auth');

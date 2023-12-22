<?php

use App\Livewire\Auth\AuthLog;
use App\Livewire\Auth\AuthReg;
use App\Livewire\Panel\Articles\ArticleCreateUpdate;
use App\Livewire\Panel\Articles\Articles;
use App\Livewire\Panel\Panel;
// use App\Livewire\Panel\Articles\ArticleForm;
use App\Livewire\Panel\ProfileUser;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome')->name('blog');
// });

Route::view('/', 'blog')->name('blog');


Route::get('reg-user', AuthReg::class)->name('register');
Route::get('log-user', AuthLog::class)->name('login');

Route::middleware('auth')->prefix('panel')->group(function () {

    // Tablero
    Route::get('', Panel::class)->name('panel');
    // Perfil
    Route::get('perfil-user-actual', ProfileUser::class)->name('perfil');
    // Perfil
    // Route::view('perfil', 'profile')->name('profile');
    // Route::view('', 'profile')->name('profile');

    // Articulos
    Route::get('articulos', Articles::class)->name('article.index');
    Route::get('crear/articulo', ArticleCreateUpdate::class)->name('article.create');
    Route::get('editar/{article}', ArticleCreateUpdate::class)->name('article.edit');
    // Route::get('editar/{article}', ArticleForm::class)->name('article.edit');

});

// Route::get('panel', Panel::class)->name('panel');
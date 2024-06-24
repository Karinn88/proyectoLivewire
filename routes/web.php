<?php

use App\Livewire\Table;
use Illuminate\Support\Facades\Route;
use App\Livewire\Form;
use App\Livewire\ExportExcel;
use App\Livewire\Edit;
use App\Livewire\PostEsther; 

Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/table', Table::class)->name('table');
Route::get('/form', Form::class)->name('form');
Route::get('/form/{id}', Form::class)->name('form-edit');
Route::get('/edit', Edit::class)->name('edit'); 
Route::get('/post', PostEsther::class)->name('post');
Route::get('/excel', ExportExcel::class)->name('excel');

Route::post('/posts/{post}/like', [PostEsther::class, 'like'])->middleware('auth');
require __DIR__.'/auth.php';



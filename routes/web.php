<?php

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

Route::redirect('/', '/login');
Route::get('/surveys/{survey}/answer', App\Http\Livewire\Surveys\Answer::class)
    ->name('surveys.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('surveys', App\Http\Livewire\Surveys\Index::class)
        ->name('surveys.index');
    Route::get('/surveys/create', App\Http\Livewire\Surveys\Form::class)
        ->name('surveys.create');
    Route::get('/surveys/{survey}/edit', App\Http\Livewire\Surveys\Form::class)
        ->name('surveys.edit');
    Route::get('/surveys/{survey}/show', App\Http\Livewire\Surveys\Show::class)
        ->name('surveys.show');

    Route::get('dimensions', App\Http\Livewire\Dimensions\Index::class)
        ->name('dimensions.index');
    Route::get('/dimensions/create', App\Http\Livewire\Dimensions\Form::class)
        ->name('dimensions.create');
    Route::get('/dimensions/{dimension}/edit', App\Http\Livewire\Dimensions\Form::class)
        ->name('dimensions.edit');
    Route::get('/dimensions/{dimension}/show', App\Http\Livewire\Dimensions\Show::class)
        ->name('dimensions.show');

    Route::get('questions', App\Http\Livewire\Questions\Index::class)
        ->name('questions.index');
    Route::get('/questions/create', App\Http\Livewire\Questions\Form::class)
        ->name('questions.create');
    Route::get('/questions/{question}/edit', App\Http\Livewire\Questions\Form::class)
        ->name('questions.edit');
    Route::get('/questions/{question}/show', App\Http\Livewire\Questions\Show::class)
        ->name('questions.show');
});

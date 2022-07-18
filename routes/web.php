<?php

use App\Http\Livewire\Dimensions\Form as DForm;
use App\Http\Livewire\Dimensions\Index as DIndex;
use App\Http\Livewire\Dimensions\Show as DShow;
use App\Http\Livewire\Questions\Form as QForm;
use App\Http\Livewire\Questions\Index as QIndex;
use App\Http\Livewire\Questions\Show as QShow;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('dimensions', DIndex::class)->name('dimensions.index');
    Route::get('/dimensions/create', DForm::class)->name('dimensions.create');
    Route::get('/dimensions/{dimension:id}/edit', DForm::class)->name('dimensions.edit');
    Route::get('/dimensions/{dimension:id}/show', DShow::class)->name('dimensions.show');

    Route::get('questions', QIndex::class)->name('questions.index');
    Route::get('/questions/create', QForm::class)->name('questions.create');
    Route::get('/questions/{question:id}/edit', QForm::class)->name('questions.edit');
    Route::get('/questions/{question:id}/show', QShow::class)->name('questions.show');

    Route::resource('users', App\Http\Controllers\UserController::class);
});

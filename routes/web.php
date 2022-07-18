<?php

use App\Http\Livewire\Dimensions\DimensionsForm;
use App\Http\Livewire\Dimensions\DimensionsIndex;
use App\Http\Livewire\Dimensions\DimensionsShow;
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

    Route::get('dimensions', DimensionsIndex::class)->name('dimensions.index');
    Route::get('/dimensions/create', DimensionsForm::class)->name('dimensions.create');
    Route::get('/dimensions/{dimension:id}/edit', DimensionsForm::class)->name('dimensions.edit');
    Route::get('/dimensions/{dimension:id}/show', DimensionsShow::class)->name('dimensions.show');

    Route::resource('questions', App\Http\Controllers\QuestionController::class);

    Route::resource('users', App\Http\Controllers\UserController::class);
});

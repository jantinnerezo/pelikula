<?php

use App\Http\Livewire\Movies\Index;
use App\Http\Livewire\Movies\Show;
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

Route::get('/', Index::class)->name('home');
Route::get('/{movie}', Show::class)->name('show');

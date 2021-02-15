<?php

use App\Http\Livewire\Sending;
use App\Http\Livewire\Search;
use App\Http\Livewire\Ad\Companies;
use App\Http\Livewire\Ad\Individuals;
use App\Http\Livewire\ShowPosts;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/sending', function () {
    return view('livewire.sending.main');
})->name('sending');

Route::middleware(['auth:sanctum', 'verified'])->get('/search', function () {
    return view('livewire.search.main');
})->name('search');

Route::middleware(['auth:sanctum', 'verified'])->get('/search/detail', function () {
    return view('livewire.search.detail');
})->name('search-detail');

Route::get('/companies', function () {
    return view('livewire.ad.companies');
})->name('companies');

Route::get('/individuals', function () {
    return view('livewire.ad.individuals');
})->name('individuals');

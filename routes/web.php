<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Livewire\Search;
use App\Http\Livewire\Sending;
use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\Ad\Companies;
use App\Http\Livewire\Sending\Step1;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Ad\Individuals;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();

            $user->setRememberToken(Str::random(60));

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');



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

// Route::group(['middleware' => ['auth', 'verified']], function () {
//     Route::resource('communities', \App\Http\Controllers\CommunityController::class);
//     Route::resource('communities', \App\Http\Controllers\CommunityController::class);
//     Route::get('communities', \App\Http\Controllers\CommunityController::class);
//     Route::get('communities', \App\Http\Controllers\CommunityController::class);
// });

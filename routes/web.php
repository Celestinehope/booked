<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

/*Route::get('/userdashboard', function () {
    return view('sample');
});*/
Route::get('/view', function () {
    return view('viewproduct');
});
Route::get('/product', [ProductsController::class, 'index']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);
 
Route::get('/auth/{provider}/callback',[ProviderController::class,'callback']);
 
//Route::get('/auth/google/redirect', function () {
 //  return Socialite::driver('google')->redirect();
//});
 
//Route::get('/auth/google/callback', function () {
  //$user = Socialite::driver('google')->user();
 
    
//});


require __DIR__.'/auth.php';
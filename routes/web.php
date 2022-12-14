<?php

use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewspaperController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Home', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/account/login',[HomeController::class,'accountLogin'])->name('/account/login');
Route::get('/account/resigter',[HomeController::class,'accountResigter'])->name('/account/resigter');
Route::get('/account/show',[HomeController::class,'show'])->name('/account/show');
Route::post('social_media/login',[SocialMediaController::class,'mediaLogin'])->name('/social_media/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::resource('menus',MenuController::class);
Route::resource('newspapers',NewspaperController::class);
Route::resource('advertisings',AdvertisingController::class);
Route::resource('settings',SettingController::class);
Route::resource('socials',SocialController::class);
Route::resource('social_media',SocialMediaController::class);
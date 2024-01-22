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

Route::get('/test', function () {
    return 'welcome';
});

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Route::match(['GET', 'POST'], '/auth', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth');

Route::get('/groups-index', [\App\Http\Controllers\FaqController::class, 'groupIndex'])
    ->middleware(['verify.shopify'])
    ->name('group.index');

Route::post('/groups-index', [\App\Http\Controllers\FaqController::class, 'groupIndex'])
    ->middleware(['verify.shopify'])
    ->name('group.save');

Route::get('/faqs/{groupid}', [\App\Http\Controllers\FaqController::class, 'faqs'])
    ->middleware(['verify.shopify'])
    ->name('group.faqs');

Route::post('/faqs/{groupid}', [\App\Http\Controllers\FaqController::class, 'faqs'])
    ->middleware(['verify.shopify'])
    ->name('group.faqs.save');

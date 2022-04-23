<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/',[IndexController::class, 'index'])->name('/');
Route::get('Country_Page/{country}',[IndexController::class, 'country_index'])->name('country');
Route::get('Saved_Page',[IndexController::class, 'saved_page_index'])->name('saved.page');
Route::get('Other_Features',[IndexController::class, 'other_page_index'])->name('other.feature');
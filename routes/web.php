<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointParPointController;
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
//     return view('user.dashboard');
// });

Route::get('/',[App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::resource('PointParPoint',PointParPointController::class);

Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\user', 'as' => 'user.'], function(){
    Route::resource('rapport', 'RapportController');

});

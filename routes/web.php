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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Dashboard Route without any Admin Group

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    Route::group(['middleware'=> ['admin']],function(){
        Route::match(['get','post'],'dashboard','AdminController@dashboard');
        Route::get('logout','AdminController@logout');

    });
    Route::match(['get','post'],'login','AdminController@login');

});


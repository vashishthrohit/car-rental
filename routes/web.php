<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
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

Route::get('/param/{id?}',function(?string $id='Rohit'){
    return 'User '.$id;
});

Route::get('ablut-us',function (){
    return view('about');
});

Route::get('blog', function(){
    return view('blog');
});

Route::get('contact', function(){
    return view('contact');
});

Route::get('listing', function(){
    return view('listing');
});

Route::get('single', function(){
    return view('single');
});

Route::get('testimonials', function(){
    return view('testimonials');
});

Route::controller(MainController::class)->group(function(){
    Route::get('/','home');
    Route::get('search-package','search_package');
    Route::get('booking-form','booking_form');
});

Route::middleware(['befor_login'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('admin-setting','login');
        Route::post('submit-login','submit_login');
    });
});

Route::middleware(['after_login'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('dashboard','dashboard');
        Route::get('add-cities','add_cities');
        Route::get('add-package','add_package');
        Route::get('logout','logout');
        Route::post('save-package','save_update_package');
        Route::get('get_all_package','get_all_records');
        Route::get('get-single-package-record','get_single_package_record');
        Route::post('save-cities','save_update_cities');
        Route::post('get-all-cities','get_all_cities');
        Route::post('get-single-cities','get_single_cities');
    });
});
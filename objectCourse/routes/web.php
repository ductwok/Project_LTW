<?php

use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\courseController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\videoController;
use App\Http\Controllers\client\homeController as ClientHomeController;
use App\Http\Controllers\login\homeController as LoginHomeController;
use App\Http\Controllers\login\loginController;
use App\model\course;
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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::middleware('can:admin')->group(function(){
    Route::prefix('admins')->group(function(){
        Route::name('admin.')->group(function(){
            Route::get('/',[homeController::class,'index'])->name('dashboard');
        });
        Route::prefix('category')->group(function(){
            Route::name('category.')->group(function(){
                Route::get('/',[categoryController::class,'index'])->name('index');
                Route::get('create',[categoryController::class,'create'])->name('create');
                Route::post('store',[categoryController::class,'store'])->name('store');
                Route::get('edit/{id}',[categoryController::class,'edit'])->name('edit');
                Route::post('update/{id}',[categoryController::class,'update'])->name('update');
                Route::get('delete',[categoryController::class,'delete'])->name('delete');
            });
        });
        Route::prefix('course')->group(function(){
            Route::name('course.')->group(function(){
                Route::get('/',[courseController::class,'index'])->name('index');
                Route::get('create',[courseController::class,'create'])->name('create');
                Route::post('store',[courseController::class,'store'])->name('store');
                Route::get('edit/{id}',[courseController::class,'edit'])->name('edit');
                Route::post('update/{id}',[courseController::class,'update'])->name('update');
                Route::get('delete',[courseController::class,'delete'])->name('delete');
            });
            Route::prefix('{id_course}/video')->group(function(){
                Route::name('video.')->group(function(){
                    Route::get('/',[videoController::class,'index'])->name('index');
                    Route::get('create',[videoController::class,'create'])->name('create');
                    Route::post('store',[videoController::class,'store'])->name('store');
                    Route::get('edit/{id}',[videoController::class,'edit'])->name('edit');
                    Route::post('update/{id}',[videoController::class,'update'])->name('update');
                    Route::get('delete',[videoController::class,'delete'])->name('delete');
                });
            });
        });
        Route::prefix('user')->group(function(){
            Route::name('user.')->group(function(){
                Route::get('/',[userController::class,'index'])->name('index');
                Route::get('create',[userController::class,'create'])->name('create');
                Route::post('store',[userController::class,'store'])->name('store');
                Route::get('edit/{id}',[userController::class,'edit'])->name('edit');
                Route::post('update/{id}',[userController::class,'update'])->name('update');
                Route::get('delete',[userController::class,'delete'])->name('delete');             
            });
        });
    });
});

Route::prefix('logins')->group(function(){
    Route::get('/',[loginController::class,'login_form'])->name('logins.form');
    Route::post('login',[loginController::class,'check_login'])->name('logins.login');
    Route::post('register',[loginController::class,'check_register'])->name('logins.register');
    Route::get('logout',[loginController::class,'logout'])->name('logins.logout');
    Route::get('resetpass',[loginController::class,'resetpass'])->name('logins.resetpass');
});

Route::prefix('/')->group(function(){
    Route::name('client.')->group(function(){
        Route::get('/',[ClientHomeController::class,'index'])->name('home');
        Route::get('course_single/{id}',[ClientHomeController::class,'course_single'])->name('course_single');
        Route::get('about',[ClientHomeController::class,'about'])->name('about');
        Route::get('contact',[ClientHomeController::class,'contact'])->name('contact');
        Route::get('course',[ClientHomeController::class,'my_course'])->name('course');
        Route::get('view_product_detail/{id}',[ClientHomeController::class,'view_product_detail'])->name('view_product_detail');
        Route::post('add_course',[ClientHomeController::class,'add_course'])->name('add_course');
        Route::post('delete_course',[ClientHomeController::class,'delete_course'])->name('delete_course');
        Route::get('profile/{id}',[ClientHomeController::class,'profile'])->name('profile');
        Route::get('edit_profile',[ClientHomeController::class,'edit_profile'])->name('edit_profile');
        Route::post('update_profile',[ClientHomeController::class,'update_profile'])->name('update_profile');
        Route::get('payment',[ClientHomeController::class,'payment'])->name('payment');
        Route::post('payment_handle',[ClientHomeController::class,'payment_handle'])->name('payment_handle');
        Route::get('payment_history',[ClientHomeController::class,'payment_history'])->name('payment_history');
        Route::post('payment_momo',[ClientHomeController::class,'payment_momo'])->name('payment_momo');
        Route::post('payment_momo_qr',[ClientHomeController::class,'payment_momo_qr'])->name('payment_momo_qr');
    });
});

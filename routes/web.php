<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\AdminProductController as AdminProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/hello', function () {
    return 'Hello World';
});

// ******************************* Home Page Root *****************************************//

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::post('/message',[HomeController::class, 'message'])->name('message');




/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// ******************************* Admin Panel *****************************************//
Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/',[AdminHomeController::class,'index'])->name('index');


    // ******************************* Admin Category Panel *****************************************//
    Route::prefix('/category')->name('category.')->controller(AdminCategoryController::class)->group(function (){

        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/show/{id}','show')->name('show');

    });












































    // ******************************* Admin Product Panel *****************************************//
    Route::prefix('/product')->name('product.')->controller(AdminProductController::class)->group(function (){

        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/show/{id}','show')->name('show');

    });
});



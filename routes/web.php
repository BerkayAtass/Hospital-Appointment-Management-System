<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;

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

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');




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

Route::get('/admin',[AdminHomeController::class,'index'])->name('admin');


// ******************************* Admin Category Panel *****************************************//

Route::get('/admin/category',[AdminCategoryController::class,'index'])->name('admin_category');
Route::get('/admin/category/create',[AdminCategoryController::class,'create'])->name('admin_category_create');
Route::post('/admin/category/store',[AdminCategoryController::class,'store'])->name('admin_category_store');
Route::get('/admin/category/edit/{id}',[AdminCategoryController::class,'edit'])->name('admin_category_edit');
Route::post('/admin/category/update/{id}',[AdminCategoryController::class,'update'])->name('admin_category_update');

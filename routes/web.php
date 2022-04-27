<?php

declare(strict_types = 1);

// use App\Http\Controllers\Blog\IndexController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', static function (){
//     return view('welcome');
// });

Route::group(['namespace' => 'Blog'], static function () {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], static function () {
    Route::group(['namespace' => 'Blog'], static function () {
        Route::get('/', 'IndexController')->name('admin');
    });

    // Category
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], static function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });
});

Auth::routes();

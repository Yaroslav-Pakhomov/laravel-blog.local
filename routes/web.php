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

// Главная страница
Route::group(['namespace' => 'Blog'], static function () {
    Route::get('/', 'IndexController')->name('blog.index');
});

// Раздел Блог
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], static function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');

    // Вложенность комментария - posts/2/comments
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], static function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
    });
    // Вложенность лайков
    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], static function () {
        Route::post('/', 'StoreController')->name('post.like.store');
    });
});

// Раздел Категории
Route::group(['namespace' => 'Category', 'prefix' => 'categories'], static function () {
    Route::get('/', 'IndexController')->name('category.index');
    // Вложенность комментариев
    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], static function () {
        Route::get('/', 'IndexController')->name('category.post.index');
    });
});

// Личный кабинет пользователя
Route::group(
    ['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']],
    static function () {
        // Main
        Route::group(['namespace' => 'Blog'], static function () {
            Route::get('/', 'IndexController')->name('personal');
        });

        // Liked
        Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], static function () {
            Route::get('/', 'IndexController')->name('personal.liked.index');
            Route::delete('/{post}', 'DeleteController')->name('personal.liked.delete');
        });

        // Comment
        Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], static function () {
            Route::get('/', 'IndexController')->name('personal.comment.index');
            Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
            Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
            Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
        });
    }
);

// Admin панель
Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']],
    static function () {
        // Main
        Route::group(['namespace' => 'Blog'], static function () {
            Route::get('/', 'IndexController')->name('admin');
        });

        // Post
        Route::group(['namespace' => 'Post', 'prefix' => 'post'], static function () {
            Route::get('/', 'IndexController')->name('admin.post.index');
            Route::get('/create', 'CreateController')->name('admin.post.create');
            Route::post('/', 'StoreController')->name('admin.post.store');
            Route::get('/{post}', 'ShowController')->name('admin.post.show');
            Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
            Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
            Route::delete('/{post}', 'StoreController')->name('admin.post.delete');
        });

        // Category
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], static function () {
            Route::get('/', 'IndexController')->name('admin.category.index');
            Route::get('/create', 'CreateController')->name('admin.category.create');
            Route::post('/', 'StoreController')->name('admin.category.store');
            Route::get('/{category}', 'ShowController')->name('admin.category.show');
            Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
            Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
            Route::delete('/{category}', 'StoreController')->name('admin.category.delete');
        });

        // Tag
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], static function () {
            Route::get('/', 'IndexController')->name('admin.tag.index');
            Route::get('/create', 'CreateController')->name('admin.tag.create');
            Route::post('/', 'StoreController')->name('admin.tag.store');
            Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
            Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
            Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
            Route::delete('/{tag}', 'StoreController')->name('admin.tag.delete');
        });

        // User
        Route::group(['namespace' => 'User', 'prefix' => 'users'], static function () {
            Route::get('/', 'IndexController')->name('admin.user.index');
            Route::get('/create', 'CreateController')->name('admin.user.create');
            Route::post('/', 'StoreController')->name('admin.user.store');
            Route::get('/{user}', 'ShowController')->name('admin.user.show');
            Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
            Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
            Route::delete('/{user}', 'StoreController')->name('admin.user.delete');
        });
    }
);

Auth::routes(['verify' => true]);

<?php

declare(strict_types = 1);

// use App\Http\Controllers\Blog\IndexController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\Post\PostController as AdminPostController;
use App\Http\Controllers\Admin\Category\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\Tag\TagController as AdminTagController;
use App\Http\Controllers\Admin\User\UserController as AdminUserController;
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
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
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
            Route::get('/', [AdminBlogController::class, 'index'])->name('admin');
        });

        // Post
        Route::group(['namespace' => 'Post', 'prefix' => 'post'], static function () {
            Route::get('/', [AdminPostController::class, 'index'])->name('admin.post.index');
            Route::get('/create', [AdminPostController::class, 'create'])->name('admin.post.create');
            Route::post('/', [AdminPostController::class, 'store'])->name('admin.post.store');
            Route::get('/{post}', [AdminPostController::class, 'show'])->name('admin.post.show');
            Route::get('/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
            Route::patch('/{post}', [AdminPostController::class, 'update'])->name('admin.post.update');
            Route::delete('/{post}', [AdminPostController::class, 'delete'])->name('admin.post.delete');
        });

        // Category
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], static function () {
            Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/', [AdminCategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/{category}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
            Route::get('/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
            Route::patch('/{category}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/{category}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');
        });

        // Tag
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], static function () {
            Route::get('/', [AdminTagController::class, 'index'])->name('admin.tag.index');
            Route::get('/create', [AdminTagController::class, 'create'])->name('admin.tag.create');
            Route::post('/', [AdminTagController::class, 'store'])->name('admin.tag.store');
            Route::get('/{tag}', [AdminTagController::class, 'show'])->name('admin.tag.show');
            Route::get('/{tag}/edit', [AdminTagController::class, 'edit'])->name('admin.tag.edit');
            Route::patch('/{tag}', [AdminTagController::class, 'update'])->name('admin.tag.update');
            Route::delete('/{tag}', [AdminTagController::class, 'delete'])->name('admin.tag.delete');
        });

        // User
        Route::group(['namespace' => 'User', 'prefix' => 'users'], static function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
            Route::post('/', [AdminUserController::class, 'store'])->name('admin.user.store');
            Route::get('/{user}', [AdminUserController::class, 'show'])->name('admin.user.show');
            Route::get('/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
            Route::patch('/{user}', [AdminUserController::class, 'update'])->name('admin.user.update');
            Route::delete('/{user}', [AdminUserController::class, 'delete'])->name('admin.user.delete');
        });
    }
);

Auth::routes(['verify' => true]);

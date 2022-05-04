<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(Category $category): Factory|View|Application
    {
        $posts = $category->posts()->paginate(6);

        return view('category.post.index', compact('posts'));
    }
}

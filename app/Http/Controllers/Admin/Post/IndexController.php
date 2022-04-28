<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends BaseController
{
    public function __invoke(): Factory|View|Application
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }
}

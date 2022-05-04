<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Personal\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $dataUser = auth()->user();
        $data = [];
        $data['countPosts'] = auth()->user()->likedPosts->count();
        $data['countComments'] = auth()->user()->comments->count();

        return view('personal.blog.index', compact('dataUser', 'data'));
    }
}

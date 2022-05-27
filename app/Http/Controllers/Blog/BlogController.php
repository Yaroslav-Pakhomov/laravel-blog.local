<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('post.index');
    }
}

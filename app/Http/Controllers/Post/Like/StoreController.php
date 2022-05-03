<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(Post $post): RedirectResponse
    {
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }
}

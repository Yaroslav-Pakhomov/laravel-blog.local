<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(Post $post): RedirectResponse
    {
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked.index');
    }
}

<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Comment $comment): Factory|View|Application
    {
        return view('personal.comment.edit', compact('comment'));
    }
}

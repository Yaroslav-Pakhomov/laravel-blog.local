<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $comments = auth()->user()->comments;

        return view('personal.comment.index', compact('comments'));
    }
}

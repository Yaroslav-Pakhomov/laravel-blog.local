<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Comment $comment): RedirectResponse
    {
        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('personal.comment.index');
    }
}

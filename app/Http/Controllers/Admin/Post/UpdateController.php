<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post): Factory|View|Application
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);

        return view('admin.posts.show', compact('post'));
    }
}

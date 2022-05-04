<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag): Factory|View|Application
    {
        $data = $request->validated();
        $tag->update($data);

        return view('admin.tags.show', compact('tag'));
    }
}

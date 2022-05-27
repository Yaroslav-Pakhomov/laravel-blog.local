<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('admin.tags.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);

        return redirect()->route('admin.tag.index');
    }

    public function show(Tag $tag): View
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag): View
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag): View
    {
        $data = $request->validated();
        $tag->update($data);

        return view('admin.tags.show', compact('tag'));
    }

    public function delete(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('admin.tag.index');
    }
}

<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category): Factory|View|Application
    {
        $data = $request->validated();
        $category->update($data);

        return view('admin.categories.show', compact('category'));
    }
}

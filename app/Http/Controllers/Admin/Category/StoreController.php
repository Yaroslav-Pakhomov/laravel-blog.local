<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\NoReturn;

class StoreController extends Controller
{
    public function __invoke(UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Category::firstOrCreate($data);

        return redirect()->route('admin.category.index');
    }
}

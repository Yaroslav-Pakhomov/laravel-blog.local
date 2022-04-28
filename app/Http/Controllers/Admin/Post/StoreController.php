<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}

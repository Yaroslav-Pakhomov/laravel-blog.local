<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }
}

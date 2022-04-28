<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function __invoke(User $user): Factory|View|Application
    {
        return view('admin.users.show', compact('user'));
    }
}

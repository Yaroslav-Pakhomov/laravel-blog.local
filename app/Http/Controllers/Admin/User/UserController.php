<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Jobs\StoreUserJob;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        $roles = User::getRoles();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        StoreUserJob::dispatch($data);

        return redirect()->route('admin.user.index');
    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        $roles = User::getRoles();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user): View
    {
        $data = $request->validated();
        $user->update($data);

        return view('admin.users.show', compact('user'));
    }

    public function delete(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }
}

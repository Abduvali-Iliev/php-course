<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('actions.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('actions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsersCreateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $file = $request->file('picture');
        if (!is_null($file)){
            $path = $file->store('pictures', 'public');
            $validated['picture'] = $path;
        }
        $product = User::create($validated);
        return redirect()->action([self::class, 'index'])->with('message', "User: {$product->name} create successfully!");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('actions.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('actions.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersCreateRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UsersCreateRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('picture')){
            $file = $request->file('picture');
            $path = $file->store('pictures', 'public');
            $validated['picture'] = $path;
        }
        $user->update($validated);
        return redirect()
            ->action([self::class, 'show'], compact('user'))
            ->with('message', 'Article success updated!');

    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        return redirect()
            ->action([self::class, 'index'])
            ->with('message', 'User successfully destroyed!');
    }
}

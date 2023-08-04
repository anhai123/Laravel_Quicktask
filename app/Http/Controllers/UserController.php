<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('tasks')->get();

        return view('user.index', [
            'users' => $user,
        ]);
    }

    public function tasks(User $user)
    {
        return view('task.index', [
            'tasks' => $user->tasks,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

               $validated = $request->validated();
               $user = new User();
               $user->fill($validated);
               $user->password = Hash::make($validated['password']);
               $user->is_admin = false;
               $user->is_active = true;
               $user->save();

               return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->fill($validated);
        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(auth()->id() == $user->id) {
            $user->delete();
           return view('welcome');
        }
        else {
            $user->delete();

            return back();
        }
    }
}

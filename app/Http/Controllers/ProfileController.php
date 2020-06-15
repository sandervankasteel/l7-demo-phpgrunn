<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        return view('profiles.show', ['user' => $user]);
    }

    public function show(User $user)
    {
        // TODO add Attended events

        return view('profiles.show', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();

        return view('profiles.edit', ['user' => $user]);
    }

    public function update(UserUpdate $request, User $user)
    {

        return redirect(route('profile.index'));
    }
}

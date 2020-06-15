<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->limit(10)->get();

        return view('welcome', compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserFollowerController extends Controller
{
    public function index()
    {
        return view('user.people', [
            'users' => User::with(['following'])->get()
        ]);
    }

    public function follow(User $user)
    {

    }

    public function unfollow()
    {

    }
}

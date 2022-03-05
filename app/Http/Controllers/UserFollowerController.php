<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserFollower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFollowerController extends Controller
{
    public function index()
    {
        return view('user.people', [
            'users' => User::with(['following'])->paginate(10)
        ]);
    }

    public function follow(User $user)
    {
        Auth::user()->following()->create(['user' => $user->id]);

        return back();
    }

    public function unfollow(User $user)
    {
        Auth::user()->following()->where('user', $user->id)->delete();

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserFollower;
use Illuminate\Http\Request;

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
        $AuthUser = auth()->user()->id;
        $followers = $user->id;
        UserFollower::create([
            'following' => $AuthUser,
            'user' => $followers,
        ]);
      return back();
    }

    public function unfollow(User $user)
    {   
        $AuthUser = auth()->user()->id;
         $unfollow = UserFollower::where('following', $AuthUser)->where('user', $user->id)->delete();
        return back();
    }
}

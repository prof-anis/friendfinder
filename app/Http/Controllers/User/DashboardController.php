<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('user.dashboard', [
            'relevantPosts' => Post::relevantToUser(Auth::user())->with('comments')->paginate(),
            'whoToFollower' => User::whereNotIn('id', Auth::user()->following()->pluck('user'))
                ->withCount('posts')->orderBy('posts_count', 'DESC')->limit(7)->get()
        ]);
    }
}

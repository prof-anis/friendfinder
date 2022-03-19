<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function index ()
    {       
        $post = Post::relevantToUser(Auth::user())->with('comments.user')->paginate();
        return response()->json([
        'post' => $post
        ]);
     }
}

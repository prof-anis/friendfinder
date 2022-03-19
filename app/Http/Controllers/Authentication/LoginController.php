<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if (!Auth::guard('web')->attempt($request->validated())) {
           return back()->with(['status' => 'Sorry, invalid username or password.']);
        }
            
          return redirect('/'.auth()->user()->username);
    }
}
 
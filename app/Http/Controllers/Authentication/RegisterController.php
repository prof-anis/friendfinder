<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Events\NewUserEvent;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
      $user = User::create($request->validated());

       NewUserEvent::dispatch($user);
       return redirect()->route('index')->with([
           'status' => 'Registration successful.'
       ]);
    }
}

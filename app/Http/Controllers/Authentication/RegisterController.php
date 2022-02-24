<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
       User::create($request->validated());

       return redirect()->route('index')->with([
           'status' => 'Registration successful.'
       ]);
    }
}

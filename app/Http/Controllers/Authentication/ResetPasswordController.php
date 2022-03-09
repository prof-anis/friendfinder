<?php

namespace App\Http\Controllers\Authentication;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\support\Facades\Hash;

class ResetPasswordController extends Controller
{  protected $email;

 
    public function index ()
    {
        return view('auth.reset-password');
    }

    public function Reset(ResetPasswordRequest $request)
    {     $email = $request->input('email');
        User::where('email', $email)->update([
            'password' => Hash::make($request->input('password'))
        ]);
         return back()->with(['status' => 'Reset password successful']);
  
    }
}

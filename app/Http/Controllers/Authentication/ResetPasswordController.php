<?php

namespace App\Http\Controllers\Authentication;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\support\Facades\Hash;

class ResetPasswordController extends Controller
{  protected $email;

    public function __construct ()
    {
        $this->email = new User;
    }
    public function index ()
    {
        return view('auth.reset-password');
    }

    public function Reset(ResetPasswordRequest $request)
    {
        $email = $request->input('email');
       if(!$this->email->isEmailValid($email))
         {
          return back()->with(['wrongemail' => 'invalid email address']); 
       }

        User::where('email', $email)->update([
            'password' => Hash::make($request->input('password'))
        ]);

         return back()->with(['status' => 'Reset password successful']);
  
    }
}

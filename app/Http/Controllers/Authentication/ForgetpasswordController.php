<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use Illuminate\Support\Facades\Mail;
use  App\Mail\Forgetpasswordmail;
use  App\jobs\ResetPasswordJob;
use App\Http\Controllers\Controller;
use App\Models\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use App\Models\User;

class ForgetpasswordController extends Controller
{
    public function __construct()
    {
    }

   public function index ()
   {   
       return view('auth.forgot-password');
   }

   public function check(ForgetPasswordRequest $request)
   {  
     
     $ResetRecord = ResetPassword::create([
        'email' => $request->email,
        'reset_token' => Str::random(60)
      ]);

      ResetPasswordJob::dispatch($ResetRecord)->delay(now()->addMinutes(1));
       return back()->with('status', 'A message has been sent to your email');

  }



}




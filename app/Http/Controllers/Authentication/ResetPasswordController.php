<?php

namespace App\Http\Controllers\Authentication;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResetPassword;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{  protected $email;

 
    public function index ($data)
    {
    if(!$this->CheckToken($data) )
    {
         return redirect()->Route('forgetpassword')->with('wrongemail', 'Token has expired');

    }
         return view('auth.reset-password', compact('data'));
    }

    public function Reset(ResetPasswordRequest $request, $data)
    {    
         $email = $request->email;

         if(!$this->CheckToken($data) || !$this->CheckEmailAndPass($email, $data) )
         {
            return redirect()->route('forgetpassword')->with('wrongemail', 'Token has expired');
         }

        User::where('email', $email)->first()->update([ 'password' => $request->input('password') ]);
         return back()->with(['status' => 'Reset password successful']);
  
    }


    public function CheckToken ($reset_token)
    {
     $reset = ResetPassword::where('reset_token', $reset_token)->first();
  
     if(!$reset || Carbon::now()->subMinutes(10) > $reset->created_at){
        return false;     
     }

     return true;
  
    }
    
    public function CheckEmailAndPass ($email, $reset_token )
    {
       if(ResetPassword::where('email', $email)->where('reset_token', $reset_token )->first()){
           return true;
       }
         return false;
    }
    

}

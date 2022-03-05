<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ForgetpasswordController extends Controller
{   
    protected $email;
    public function __construct()
    {
        $this->email = new User;
    }

   public function index ()
   {
       return view('auth.forgot-password');
   }

   public function check(ForgetPasswordRequest $request){

    $email = $request->input('email');
    if(!$this->email->isEmailValid($email)){
        return back()->with(['wrongemail' => 'invalid email address']);
    }
       return redirect()->route('mail');

    
   }
}




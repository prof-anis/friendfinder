<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
       return redirect()->route('mail');
   }
}




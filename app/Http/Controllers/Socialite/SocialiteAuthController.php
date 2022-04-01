<?php

namespace App\Http\Controllers\Socialite;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\str;
use Illuminate\Http\Request;

class SocialiteAuthController extends Controller
{
    public function get (string $provider)
   {
     return Socialite::driver($provider)->redirect();
   }

   public function save (string $provider ) 
   {
     $user = Socialite::driver($provider)->user();
  
      $socialiteUser = User::FirstOrCreate([
          'socialite' => $provider,
          'socialite_auth_id' => $user->getId(),
      ], 
      [
          'first_name' => $user->nickname,
          'last_name' => $user->nickname,
          'username' => $user->nickname,
          'email' => $user->email,
          'image' => $user->avatar,
          'gender' => 'male',
          'password'=> $user->nickname,
          'socialite' => $provider,
          'socialite_auth_id' => $user->getId()
       ]
    );

    Auth::login($socialiteUser);
 
    return redirect('/'.auth()->user()->username);

   }


}

<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
  /**
  * google
  */
  public function google()
  {
    return Socialite::driver('google')->redirect();
  }
  /**
  * callback google
  */
  public function callback()
  {
    $user = Socialite::driver('google')->user();
    dd($user);
  }
}

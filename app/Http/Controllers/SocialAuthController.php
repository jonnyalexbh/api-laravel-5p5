<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
  /**
  * redirectToProvider
  */
  public function redirectToProvider($provider)
  {
    return Socialite::driver($provider)->redirect();
  }
  /**
  * handleProviderCallback
  */
  public function handleProviderCallback($provider)
  {
    $user = Socialite::driver($provider)->user();
    dd($user);
  }
}

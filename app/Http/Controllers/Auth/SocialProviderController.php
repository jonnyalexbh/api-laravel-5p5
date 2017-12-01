<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use App\SocialProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SocialProviderController extends Controller
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

    try {
      $socialiteUser = Socialite::driver($provider)->user();
    } catch (Exception $e) {
      return redirect('/');
    }

    // check if that user already exists in the DB
    $findUser = SocialProvider::where('provider_id', $socialiteUser->getId())->first();

    if ($findUser) {
      $user = $findUser->user;
    }
    // otherwise create a new user
    else {
      $user = User::firstOrCreate(
        ['name' => $socialiteUser->getName()],
        ['email' => $socialiteUser->getEmail()],
        ['password' => str_random(15)]
      );

      $user->socialProviders()->create([
        'provider_id' => $socialiteUser->getId(),
        'provider' => $provider
      ]);
    }

    Auth::login($user);
    return redirect('home');

  }
}

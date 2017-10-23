<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{

  private $client;

  /**
  * __construct
  */
  public function __construct(){
    $this->client = Client::find(2);
  }

  /**
  * login
  */
  public function login(Request $request){

    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);

    $params = [
      'grant_type' => 'password',
      'client_id' => $this->client->id,
      'client_secret' => $this->client->secret
    ];

    $request->request->add($params);

    $proxy = Request::create('oauth/token', 'POST');

    return Route::dispatch($proxy);
  }

}

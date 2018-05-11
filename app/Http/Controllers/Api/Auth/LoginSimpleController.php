<?php

namespace App\Http\Controllers\Api\Auth;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginSimpleController extends Controller
{
  /**
  * login
  *
  */
  public function login() {
    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
      $user = Auth::user();
      $success['token'] = $user->createToken('MyAppLogin')->accessToken;
      return response()->json(['success' => $success], 200);
    }
    else {
      return response()->json(['error' => 'Unauthorised'], 401);
    }
  }
  /**
  * register
  *
  */
  public function register(Request $request) {

    $validator = Validator::make($request->all(),[
      'first_name' => 'required',
      'second_name' => 'required',
      'first_sur_name' => 'required',
      'second_sur_name' => 'required',
    ]);

    if($validator->fails()) {
      return response()->json(['error' => $validator->errors()], 401);
    }

    $input = $request->all();

    $input['identification'] = '99999999';
    $input['first_name'] = $input['first_name'];
    $input['second_name'] = $input['second_name'];
    $input['first_sur_name'] = $input['first_sur_name'];
    $input['second_sur_name'] = $input['second_sur_name'];
    $input['dt_birth'] = '19900928';
    $input['phone'] = '3094522';
    $input['mobile'] = '3128526354';
    $input['email'] = 'test@test.com';
    $input['is_active'] = 1;
    $input['password'] = bcrypt('secret');
    $input['gender_id'] = \App\Gender::all()->random()->id;
    $input['marital_status_id'] = \App\Marital_status::all()->random()->id;
    $input['tp_doc_id'] = \App\Tp_doc::all()->random()->id;
    $input['country_id'] = \App\Countrie::all()->random()->id;
    $input['geo_div_id'] = \App\Geo_div::all()->random()->id;
    $input['remember_token'] = str_random(10);
    $input['api_token'] = str_random(10);

    $user = \App\User::create($input);
    $success['token'] = $user->createToken('MyAppRegister')->accessToken;
    $success['name'] = $user->first_name;

    return response()->json(['success' => $success], 200);
  }
  /**
  * details
  *
  */
  public function details()
  {
    $user = Auth::user();
    return response()->json(['success' => $user], 200);
  }
  /**
  * logout
  *
  */
  public function logout()
  {
    $accessToken = Auth::user()->token();
    $accessToken->revoke();
    return response()->json(['success' => $accessToken], 200);
  }
}

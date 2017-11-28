<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  /**
  * users
  */
  function index(){
    $users = User::all();
    return response()->json(['data' => $users], 200);
  }
}

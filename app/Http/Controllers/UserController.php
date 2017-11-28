<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
  * users
  */
  function index(){
    $users = User::all();
    return view('users.index', compact('users'));
  }

}

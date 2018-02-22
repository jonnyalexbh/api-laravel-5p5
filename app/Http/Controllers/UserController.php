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
  /**
  * users all
  */
  function usersAll()
  {
    $users = User::with('tp_doc', 'gender', 'marital_status')->get();
    return $users;
  }

}

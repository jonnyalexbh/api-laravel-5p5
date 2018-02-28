<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  /**
  *
  * index
  */
  function index(){
    $users = User::with('tp_doc', 'gender', 'marital_status')->get();
    return response()->json(['data' => $users], 200);
  }
  /**
  *
  * show
  */
  public function show($id)
  {
    $user = User::with('tp_doc', 'gender', 'marital_status')->find($id);
    return response()->json(['data' => $user], 200);
  }
}

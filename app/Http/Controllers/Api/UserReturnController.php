<?php

namespace App\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserReturnController extends Controller
{
  /**
  *
  * index
  */
  function index(){
    $users = DB::table('users')->get();
    $users = json_decode($users, true);

    $info = [];
    foreach ($users as $key => $row) {
      $info[$key] = $row;
    }

    return response()->json(['data' => $info], 200);

  }
}

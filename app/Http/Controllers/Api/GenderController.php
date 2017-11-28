<?php

namespace App\Http\Controllers\Api;

use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
  /**
  * users gender
  */
  function usersGender($id){
    $usersGender = Gender::find($id)->users;
    return response()->json(['data' => $usersGender], 200);
  }
}

<?php

namespace App\Http\Controllers\Api;

use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
  /**
  *
  * index
  */
  public function index()
  {
    $genders =  Gender::all();
    return response()->json(['data' => $genders], 200);
  }
  /**
  *
  * show
  */
  public function show(Gender $gender)
  {
    return response()->json(['data' => $gender], 200);
  }
}

<?php

namespace App\Http\Controllers\Api;

use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
  /**
  * index
  *
  */
  public function index()
  {
    $genders =  Gender::all();
    return response()->json(['data' => $genders], 200);
  }
  /**
  * show
  *
  */
  public function show(Gender $gender)
  {
    return response()->json(['data' => $gender], 200);
  }
  /**
  * store
  *
  */
  public function store(Request $request)
  {
    $gender = Gender::create($request->all());
    return response()->json(['data' => $gender], 201);
  }
  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    $gender = Gender::destroy($id);
    return response()->json(['data' => $gender], 200);
  }
}

<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class GenderController extends ApiController
{
  /**
  * index
  *
  */
  public function index()
  {
    $genders =  Gender::all();
    return $this->showAll($genders);
  }
  /**
  * show
  *
  */
  public function show(Gender $gender)
  {
    return $this->showOne($gender);
  }
  /**
  * update
  *
  */
  public function update(Request $request, Gender $gender)
  {
    $rules = [
      'name' => 'required|min:6',
    ];

    $validator = Validator::make($request->all(), $rules);

    if($validator->fails()) {
      return response()->json(['error' => $validator->errors()], 401);
    }

    if ($request->has('name')) {
      $gender->name = $request->name;
    }

    if (!$gender->isDirty()) {
      return $this->errorResponse('You need to specify a different value to update', 422);
    }

    $gender->save();

    return $this->showOne($gender);
  }
  /**
  * store
  *
  */
  public function store(Request $request)
  {
    $fields = $request->all();

    $validator = Validator::make($fields, [
      'id' => 'required',
      'name' => 'required'
    ]);

    if($validator->fails()){
      return $this->validationErrors('Validation error.', $validator->errors());
    }

    $gender = Gender::create($fields);
    return $this->showOne($gender, 201);
  }
  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    $gender = Gender::destroy($id);
    return $this->showOne($gender);
  }
}

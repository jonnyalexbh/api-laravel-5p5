<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{

  /**
  * users one-to-many relationship
  */
  public function users(){
    return $this->hasMany(User::class);
  }

}

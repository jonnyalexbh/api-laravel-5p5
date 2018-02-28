<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
  protected $table = 'genders';
  protected $primaryKey = 'id';
  protected $keyType = 'int';
  protected $fillable = ['id', 'name'];

  /**
  * users one-to-many relationship
  */
  public function users()
  {
    return $this->hasMany('App\User');
  }

  /**
  * accessor name
  */
  function getNameAttribute($value)
  {
    return strtoupper($value);
  }

  /**
  * accessor created_at
  */
  function getCreatedAtAttribute($value)
  {
    return Carbon::parse($value)->format('d/m/Y');
  }

  /**
  * accessor updated_at
  */
  function getUpdatedAtAttribute($value)
  {
    return Carbon::parse($value)->format('d/m/Y h:i A');
  }

}

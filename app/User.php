<?php

namespace App;

use App\Tp_doc;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens, Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
  * gender one-to-one relationship
  */
  public function gender()
  {
    return $this->belongsTo('App\Gender');
  }

  /**
  * tp_doc one-to-one relationship
  */
  public function tp_doc()
  {
    return $this->belongsTo(Tp_doc::class)->select(['id', 'name']);
  }

  /**
  * marital_status one-to-one relationship
  */
  public function marital_status()
  {
    return $this->belongsTo('App\Marital_status');
  }

  /**
  * socialProviders relationship
  */
  public function socialProviders()
  {
    return $this->hasMany('App\SocialProvider');
  }
}

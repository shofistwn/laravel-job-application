<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id'
  ];

  public function candidate()
  {
    return $this->hasMany(Candidate::class);
  }
}
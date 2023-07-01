<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id'
  ];

  public function skill_set()
  {
    return $this->hasOne(SkillSet::class);
  }
}
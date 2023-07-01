<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
  use SoftDeletes;

  protected $guarded = [
    'id'
  ];

  public function job()
  {
    return $this->belongsTo(Job::class);
  }

  public function skill_set()
  {
    return $this->hasOne(SkillSet::class);
  }
}
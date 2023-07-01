<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
      'id'
    ];

    public function candidate()
    {
      return $this->belongsTo(Candidate::class);
    }

    public function skill()
    {
      return $this->belongsTo(Skill::class);
    }
}

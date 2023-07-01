<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $skills = [
      'HTML',
      'CSS',
      'JavaScript',
      'PHP',
      'Python',
      'Database Management',
      'Java',
      'Swift',
      'iOS Development',
      'Wireframing',
      'Prototyping',
      'User Research',
      'Python',
      'Machine Learning',
      'Data Visualization',
    ];

    foreach ($skills as $skill_name) {
      Skill::create([
        'name' => $skill_name
      ]);
    }
  }
}
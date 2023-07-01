<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $jobs = [
      'Front-End Web Developer',
      'Back-End Web Developer',
      'Full-Stack Web Developer',
      'Mobile App Developer',
      'UI/UX Designer',
      'Data Scientist',
    ];

    foreach ($jobs as $job_name) {
      Job::create([
        'name' => $job_name
      ]);
    }
  }
}
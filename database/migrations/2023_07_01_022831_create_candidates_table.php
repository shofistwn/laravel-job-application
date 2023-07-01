<?php

use App\Models\Job;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('candidates', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Job::class);
      $table->string('name');
      $table->string('email')->unique();
      $table->string('phone')->unique();
      $table->year('year');
      $table->integer('created_by')->nullable();
      $table->integer('updated_by')->nullable();
      $table->integer('deleted_by')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('candidates');
  }
};
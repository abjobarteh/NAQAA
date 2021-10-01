<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditedProgrammeComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accredited_programme_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programme_id')->nullable()->constrained('training_provider_programmes');
            $table->string('course_level_no')->nullable();
            $table->string('course_title')->nullable();
            $table->string('pre_requisite')->nullable();
            $table->string('contact_hours_lecture')->nullable();
            $table->string('contact_hours_tutorial')->nullable();
            $table->string('contact_hours_practical')->nullable();
            $table->string('course_group')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accredited_programme_components');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingProviderStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_provider_students', function (Blueprint $table) {
            $table->id();
            $table->String('student_id')->nullable();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('local_language')->nullable();
            $table->longText('address')->nullable();
            $table->string('attendance_status')->nullable();
            $table->date('admission_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('programme_name')->nullable();
            $table->foreignId('qualification_at_entry')->nullable()->constrained('qualification_levels');
            $table->foreignId('region_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('town_village_id')->nullable()->constrained('towns_villages');
            $table->foreignId('award')->nullable()->constrained('qualification_levels');
            $table->string('field_of_education')->nullable();
            $table->string('sponsor')->nullable();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->string('academic_year')->nullable();
            $table->string('picture')->nullable();
            $table->string('is_submitted')->nullable();
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
        Schema::dropIfExists('training_provider_students');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registration_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('training_provider_students');
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->foreignId('programme_id')->nullable()->constrained('qualifications');
            $table->foreignId('programme_level_id')->nullable()->constrained('qualification_levels');
            $table->string('academic_year')->nullable();
            $table->string('candidate_type')->nullable();
            $table->longText('unit_standards')->nullable();
            $table->string('registration_status')->nullable();
            $table->longText('registration_no')->nullable();
            $table->dateTime('registration_date')->nullable();
            $table->longText('candidate_id')->nullable();
            $table->string('serial_no')->nullable();
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
        Schema::dropIfExists('student_registration_details');
    }
}

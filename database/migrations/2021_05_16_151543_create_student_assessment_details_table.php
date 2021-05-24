<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssessmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assessment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('registered_students');
            $table->foreignId('assessor_id')->nullable()->constrained('trainers');
            $table->foreignId('application_id')->nullable()->constrained('student_registration_details');
            $table->string('assessment_status')->nullable();
            $table->string('qualification_type')->nullable();
            $table->string('last_assessment_date')->nullable();
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
        Schema::dropIfExists('student_assessment_details');
    }
}

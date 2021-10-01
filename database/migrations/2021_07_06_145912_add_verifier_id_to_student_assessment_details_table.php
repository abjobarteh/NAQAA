<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifierIdToStudentAssessmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_assessment_details', function (Blueprint $table) {
            $table->foreignId('verifier_id')->nullable()->constrained('trainers');
            $table->longText('comments')->nullable();
            $table->string('assessment_center')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_assessment_details', function (Blueprint $table) {
            $table->foreignId('verifier_id')->nullable()->constrained('trainers');
            $table->longText('comments')->nullable();
            $table->string('assessment_center')->nullable();
        });
    }
}

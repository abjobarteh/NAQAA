<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditedProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accredited_programmes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainingprovider_id')->nullable()->constrained('training_providers');
            $table->foreignId('application_id')->nullable()->constrained('application_details');
            $table->string('programme_title');
            $table->string('level');
            $table->string('mentoring_institution')->nullable();
            $table->string('mentoring_institution_address')->nullable();
            $table->string('programme_affiliation_proof')->nullable();
            $table->string('programme_support_proof')->nullable();
            $table->longText('programme_aims')->nullable();
            $table->longText('programme_objectives')->nullable();
            $table->longText('admission_requirements')->nullable();
            $table->longText('progression_requirements')->nullable();
            $table->longText('learning_outcomes')->nullable();
            $table->string('duration')->nullable();
            $table->string('total_qualification_time')->nullable();
            $table->string('level_of_fees')->nullable();
            $table->string('department_name')->nullable();
            $table->date('department_establishment_date')->nullable();
            $table->longText('department_head_names')->nullable();
            $table->longText('department_head_qualifications')->nullable();
            $table->longText('department_head_other_qualifications')->nullable();
            $table->longText('department_head_experience')->nullable();
            $table->longText('curriculum_design_process')->nullable();
            $table->longText('curriculum_update')->nullable();
            $table->longText('programme_structure')->nullable();
            $table->longText('students_assessment_mode')->nullable();
            $table->longText('certification_mode')->nullable();
            $table->longText('external_examiners_appointment_evidence')->nullable();
            $table->longText('staff_recruitment_policy')->nullable();
            $table->longText('provisions_for_disability')->nullable();
            $table->longText('provided_safety_facilities')->nullable();
            $table->string('accreditation_status')->nullable();
            $table->date('accreditation_start_date')->nullable();
            $table->date('accreditation_end_date')->nullable();
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
        Schema::dropIfExists('accredited_programmes');
    }
}

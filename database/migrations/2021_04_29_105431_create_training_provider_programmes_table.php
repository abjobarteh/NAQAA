<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingProviderProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_provider_programmes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->foreignId('programme_id')->nullable()->constrained('programs');
            $table->string('level')->nullable();
            $table->string('mentoring_institution')->nullable();
            $table->string('mentoring_institution_address')->nullable();
            $table->string('programme_affiliation_proof')->nullable();
            $table->string('programme_support_proof')->nullable();
            $table->longText('programme_aims')->nullable();
            $table->longText('programme_objectives')->nullable();
            $table->longText('admission_requirements')->nullable();
            $table->longText('progression_requirements')->nullable();
            $table->longText('learning_outcomes')->nullable();
            $table->string('studentship_duration')->nullable();
            $table->string('total_qualification_time')->nullable();
            $table->string('level_of_fees')->nullable();
            $table->string('department_name')->nullable();
            $table->date('department_establishment_date')->nullable();
            $table->longText('curriculum_design_process')->nullable();
            $table->longText('curriculum_update')->nullable();
            $table->longText('programme_structure')->nullable();
            $table->longText('students_assessment_mode')->nullable();
            $table->longText('certification_mode')->nullable();
            $table->longText('external_examiners_appointment_evidence')->nullable();
            $table->longText('staff_recruitment_policy')->nullable();
            $table->longText('provisions_for_disability')->nullable();
            $table->longText('provided_safety_facilities')->nullable();
            $table->foreignId('field_of_education')->nullable()->constrained('education_fields');
            $table->string('awarding_body')->nullable();
            $table->string('is_accredited')->nullable();
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
        Schema::dropIfExists('training_provider_programmes');
    }
}

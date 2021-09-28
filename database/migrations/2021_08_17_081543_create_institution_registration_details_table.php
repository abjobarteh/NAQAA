<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionRegistrationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_registration_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->foreignId('application_id')->nullable()->constrained('application_details');
            $table->date('letter_of_interim_authorisation_issuance_date')->nullable();
            $table->string('letter_of_interim_authorisation_issuance_copy')->nullable();
            $table->longText('justification_for_institution')->nullable();
            $table->string('is_affiliated')->nullable();
            $table->string('affiliation_attachment')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('aims')->nullable();
            $table->longText('objectives')->nullable();
            $table->longText('philosophy')->nullable();
            $table->string('has_five_year_plan')->nullable();
            $table->string('five_year_plan_attachment')->nullable();
            $table->string('leagal_instrument_attachment')->nullable();
            $table->string('is_name_legally_protected')->nullable();
            $table->string('name_protection_attachment')->nullable();
            $table->string('is_sponsor_legal')->nullable();
            $table->string('sponsor_legality_attachment')->nullable();
            $table->string('has_academic_calendar')->nullable();
            $table->string('academic_calendar_attachment')->nullable();
            $table->string('no_of_faculties')->nullable();
            $table->longText('names_of_faculties')->nullable();
            $table->string('no_of_departments')->nullable();
            $table->longText('name_of_departments')->nullable();
            $table->longText('research_modalities')->nullable();
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
        Schema::dropIfExists('institution_registration_details');
    }
}

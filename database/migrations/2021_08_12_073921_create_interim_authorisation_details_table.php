<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterimAuthorisationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interim_authorisation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->foreignId('application_id')->nullable()->constrained('application_details');
            $table->string('proposed_name')->nullable();
            $table->longText('street')->nullable();
            $table->foreignId('region_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('town_village_id')->nullable()->constrained('towns_villages');
            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->string('organogramme')->nullable();
            $table->longText('objectives')->nullable();
            $table->longText('sources_of_funding_details')->nullable();
            $table->string('physical_structure_plan')->nullable();
            $table->string('five_year_strategic_plan')->nullable();
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
        Schema::dropIfExists('interim_authorisation_details');
    }
}

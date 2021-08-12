<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorisationProgrammeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorisation_programme_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interim_authorisation_id')->nullable()->constrained('interim_authorisation_details');
            $table->string('title')->nullable();
            $table->string('qualification_to_attain')->nullable();
            $table->string('duration')->nullable();
            $table->longText('justification')->nullable();
            $table->longText('description')->nullable();
            $table->longText('objectives')->nullable();
            $table->longText('learning_outcome')->nullable();
            $table->longText('target_students')->nullable();
            $table->longText('entry_requirements')->nullable();
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
        Schema::dropIfExists('authorisation_programme_details');
    }
}

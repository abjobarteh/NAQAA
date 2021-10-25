<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerAccreditationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_accreditation_details', function (Blueprint $table) {
            $table->id();
            $table->string('area')->nullable();
            $table->string('level')->nullable();
            $table->foreignId('programme_id')->nullable()->constrained('training_provider_programmes');
            $table->foreignId('programme_level_id')->nullable()->constrained('qualification_levels');
            $table->foreignId('application_id')->nullable()->constrained('application_details');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers');
            $table->string('status')->nullable();
            $table->string('accreditation_status')->nullable();
            $table->foreignId('field_of_education_id')->nullable()->constrained('education_fields');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainer_accreditation_details');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationLicenceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_licence_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers');
            $table->string('trainer_type')->nullable();
            $table->string('practical_trainer_type')->nullable();
            $table->foreignId('application_id')->nullable()->constrained('application_details');
            $table->date('licence_start_date')->nullable();
            $table->date('licence_end_date')->nullable();
            $table->string('license_status')->nullable();
            $table->longText('license_no')->nullable();
            $table->longText('license_collected')->nullable();
            $table->longText('collected_by')->nullable();
            $table->longText('date_collected')->nullable();
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
        Schema::dropIfExists('registration_licence_details');
    }
}

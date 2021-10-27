<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers');
            $table->foreignId('programme_id')->nullable()->constrained('training_provider_programmes');
            $table->string('application_type')->nullable();
            $table->string('application_no')->nullable();
            $table->string('status')->nullable();
            $table->string('application_form_status')->nullable();
            $table->string('submitted_from')->nullable();
            $table->string('serial_no')->nullable();
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
        Schema::dropIfExists('application_details');
    }
}

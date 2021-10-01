<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammeAccreditationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_accreditation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->nullable()->constrained('application_details');
            $table->foreignId('programme_id')->nullable()->constrained('training_provider_programmes');
            $table->string('status')->nullable();
            $table->date('accreditation_start_date')->nullable();
            $table->date('accreditation_end_date')->nullable();
            $table->string('accreditation_status')->nullable();
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
        Schema::dropIfExists('programme_accreditation_details');
    }
}

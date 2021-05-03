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
            $table->string('area');
            $table->string('level');
            $table->foreignId('application_id')->nullable()->constrained('application_details');
            $table->string('status')->nullable();
            $table->date('accreditation_start_date')->nullable();
            $table->date('accreditation_end_date')->nullable();
            $table->string('accreditation_status')->nullable();
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

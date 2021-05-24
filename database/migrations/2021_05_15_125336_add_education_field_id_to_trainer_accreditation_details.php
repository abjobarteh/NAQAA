<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEducationFieldIdToTrainerAccreditationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainer_accreditation_details', function (Blueprint $table) {
            $table->foreignId('field_of_education_id')->nullable()->constrained('education_fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainer_accreditation_details', function (Blueprint $table) {
            //
        });
    }
}

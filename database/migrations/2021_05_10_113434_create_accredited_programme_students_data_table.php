<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditedProgrammeStudentsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accredited_programme_students_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programme_id')->nullable()->constrained('training_provider_programmes');
            $table->string('student_data_type')->nullable();
            $table->json('students_data')->nullable();
            $table->json('projections')->nullable();
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
        Schema::dropIfExists('accredited_programme_students_data');
    }
}

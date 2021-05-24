<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditedProgrammeStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accredited_programme_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accredited_programme_id')->nullable()->constrained('accredited_programmes');
            $table->string('name');
            $table->string('gender');
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->string('rank');
            $table->date('employement_date')->nullable();
            $table->longText('staff_type')->nullable();
            $table->longText('qualifications')->nullable();
            $table->longText('post_qualification_experience')->nullable();
            $table->longText('courses_taught')->nullable();
            $table->longText('extra_curricular_activities')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('accredited_programme_staff');
    }
}

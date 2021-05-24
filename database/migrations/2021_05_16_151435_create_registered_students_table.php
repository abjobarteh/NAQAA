<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisteredStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_students', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('email')->nullable();
            $table->string('contact_number');
            $table->string('candidate_type');
            $table->longText('address');
            $table->foreignId('region_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('townvillage_id')->nullable()->constrained('towns_villages');
            $table->foreignId('programme_id')->nullable()->constrained('qualifications');
            $table->foreignId('programme_level_id')->nullable()->constrained('qualification_levels');
            $table->foreignId('institution_id')->nullable()->constrained('training_providers');
            $table->date('academic_year')->nullable();
            $table->longText('candidate_id')->nullable();
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('registered_students');
    }
}

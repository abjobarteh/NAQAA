<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('TIN')->nullable();
            $table->string('NIN')->nullable();
            $table->string('AIN')->nullable();
            $table->string('email')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->json('employment_history')->nullable();
            $table->json('authentications')->nullable();
            $table->string('type')->nullable();
            $table->json('academic_qualifications')->nullable();
            $table->json('relevant_experiences')->nullable();
            $table->string('storage_path')->nullable();
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
        Schema::dropIfExists('trainers');
    }
}

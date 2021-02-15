<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_id')->nullable();

            $table->unsignedBigInteger('trainer_id')->nullable();

            $table->timestamp('validity_start');

            $table->timestamp('validity_end');

            $table->timestamps();

            $table->foreign('institution_id')->references('id')->on('instutions')->onDelete('cascade');
            
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licences');
    }
}

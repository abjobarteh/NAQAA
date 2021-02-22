<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}

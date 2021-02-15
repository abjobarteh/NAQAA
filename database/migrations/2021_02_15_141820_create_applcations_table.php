<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplcationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_id')->nullable();

            $table->unsignedBigInteger('trainer_id')->nullable();

            $table->timestamp('submission_date');

            $table->timestamp('approved_date');
            
            $table->string('status',100);

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
        Schema::dropIfExists('applications');
    }
}

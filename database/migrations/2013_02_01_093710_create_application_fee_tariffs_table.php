<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFeeTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_fee_tariffs', function (Blueprint $table) {
            $table->id();
            $table->float('amount',10,2);
            $table->string('application_category')->nullable();
            $table->string('application_type')->nullable();
            $table->string('applicant_type')->nullable();
            $table->string('stakeholder')->nullable();
            $table->string('approved')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('application_fee_tariffs');
    }
}

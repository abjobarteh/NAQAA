<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionPromotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_promoters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interim_authorisation_id')->nullable()->constrained('interim_authorisation_details');
            $table->string('fullname');
            $table->date('date_of_birth');
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('passport_copy')->nullable();
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
        Schema::dropIfExists('institution_promoters');
    }
}

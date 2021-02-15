<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('manager');
            $table->string('institution_type_id');
            $table->unsignedBigInteger('institution_category_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('town_village_id')->nullable();
            $table->unsignedBigInteger('licence_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('institution_category_id')->references('id')->on('institution_categories')->onDelete('cascade');
            $table->foreign('institution_type_id')->references('id')->on('institution_types')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('town_village_id')->references('id')->on('towns_villages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
}

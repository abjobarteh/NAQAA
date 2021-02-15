<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituionsProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->text('description', 255)->nullable();
            $table->text('status', 255)->nullable();
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->unsignedBigInteger('program_level_id')->nullable();
            $table->unsignedBigInteger('program_category_id')->nullable();
            $table->timestamps();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->foreign('program_level_id')->references('id')->on('program_levels')->onDelete('cascade');
            $table->foreign('program_category_id')->references('id')->on('program_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution_programs');
    }
}

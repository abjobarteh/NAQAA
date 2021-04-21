<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramDetailsDataCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_details_data_collections', function (Blueprint $table) {
            $table->id();
            $table->string('program_name');
            $table->integer('duration');
            $table->double('tuition_fee_per_year');
            $table->text('entry_requirements');
            $table->foreignId('education_field_id')->nullable()->constrained();
            $table->foreignId('awarding_body_id')->nullable()->constrained('award_bodies');
            $table->foreignId('institution_detail_id')->nullable()->constrained('institution_details_data_collections');
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
        Schema::dropIfExists('program_details_data_collections');
    }
}

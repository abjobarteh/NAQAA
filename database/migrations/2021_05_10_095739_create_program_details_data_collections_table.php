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
            $table->foreignId('programme_id')->nullable()->constrained('training_provider_programmes');
            $table->string('training_provider')->nullable();
            $table->string('program_name')->nullable();
            $table->string('field_of_education')->nullable();
            $table->integer('duration');
            $table->double('tuition_fee_per_year');
            $table->longText('entry_requirements');
            $table->string('awarding_body')->nullable();
            $table->string('academic_year')->nullable();
            $table->integer('import_id')->unique()->nullable();
            $table->timestamps();
        });
    }

    // public function up()
    // {
    //     Schema::table('program_details_data_collections', function (Blueprint $table) {
    //         $table->string('training_provider');
    //         $table->string('program_name');
    //         $table->string('field_of_education');
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_details_data_collections');
    }

    // public function down()
    // {
    //     Schema::table('program_details_data_collections', function (Blueprint $table) {
    //         $table->dropColumn('training_provider');
    //         $table->dropColumn('program_name');
    //         $table->dropColumn('field_of_education');
    //     });
    // }
}

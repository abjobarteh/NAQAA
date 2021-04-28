<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionDetailsDataCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_details_data_collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('po_box')->nullable();
            $table->string('website')->nullable();
            $table->string('financial_source')->nullable();
            $table->string('estimated_yearly_turnover')->nullable();
            $table->integer('enrollment_capacity')->nullable();
            $table->integer('no_of_lecture_rooms')->nullable();
            $table->integer('no_of_computer_labs')->nullable();
            $table->integer('total_no_of_computers_in_labs')->nullable();
            $table->foreignId('ownership_id')->nullable()->constrained('training_provider_ownerships');
            $table->foreignId('classification_id')->nullable()->constrained('training_provider_classifications');
            $table->foreignId('region')->nullable()->constrained('regions');
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('lga_id')->nullable()->constrained('local_goverment_areas');
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
        Schema::dropIfExists('institution_details_data_collections');
    }
}

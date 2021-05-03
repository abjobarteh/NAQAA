<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers');
            $table->string('applicant_type')->nullable();
            $table->string('application_no')->nullable();
            $table->string('application_category')->nullable();
            $table->string('application_type')->nullable();
            $table->string('status')->nullable();
            $table->string('application_form_status')->nullable();
            $table->date('application_date')->nullable();
            $table->string('submitted_by')->nullable();
            $table->string('received_by')->nullable();
            $table->date('date_received')->nullable();
            $table->json('application_checklists')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_details');
    }
}

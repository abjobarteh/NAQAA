<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingProviderChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_provider_checklists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers');
            $table->foreignId('checklist_id')->nullable()->constrained('checklists');
            $table->longText('path');
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
        Schema::dropIfExists('training_provider_checklists');
    }
}

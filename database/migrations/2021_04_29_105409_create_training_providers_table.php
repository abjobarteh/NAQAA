<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('physical_address');
            $table->string('postal_address');
            $table->foreignId('region_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('town_village_id')->nullable()->constrained('towns_villages');
            $table->string('location')->nullable();
            $table->string('telepehone_work');
            $table->string('mobile_phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('training_provider_classifications');
            $table->string('storage_path')->nullable();
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
        Schema::dropIfExists('training_providers');
    }
}

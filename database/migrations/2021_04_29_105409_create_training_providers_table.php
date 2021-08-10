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
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('po_box')->nullable();
            $table->string('fax')->nullable();
            $table->string('telephone_work')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('website')->nullable();
            $table->foreignId('region_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('town_village_id')->nullable()->constrained('towns_villages');
            $table->foreignId('lga_id')->nullable()->constrained('local_goverment_areas');
            $table->string('location')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('training_provider_categories');
            $table->foreignId('ownership_id')->nullable()->constrained('training_provider_ownerships');
            $table->foreignId('classification_id')->nullable()->constrained('training_provider_classifications');
            $table->foreignId('login_id')->nullable()->constrained('users');
            $table->string('is_registered')->nullable();
            $table->string('storage_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('bank_signatories', function (Blueprint $table) {
            $table->id();
            $table->string('Fullname');
            $table->string('position');
            $table->longText('signature')->nullable();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
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
        Schema::dropIfExists('training_providers');
        Schema::dropIfExists('bank_signatories');
    }
}

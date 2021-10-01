<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndorsedCertificateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endorsed_certificate_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_provider_id')->nullable()->constrained('training_providers');
            $table->string('programme')->nullable();
            $table->string('level')->nullable();
            $table->string('total_certificates_declared')->nullable();
            $table->string('total_certificates_received')->nullable();
            $table->string('total_males')->nullable();
            $table->string('total_females')->nullable();
            $table->longText('trainer_details')->nullable();
            $table->string('endorsed_certificates')->nullable();
            $table->string('non_endorsed_certificates')->nullable();
            $table->date('programme_start_date')->nullable();
            $table->date('programme_end_date')->nullable();
            $table->string('request_status')->nullable();
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
        Schema::dropIfExists('endorsed_certificate_details');
    }
}

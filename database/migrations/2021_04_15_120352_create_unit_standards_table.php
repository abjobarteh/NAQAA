<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_standards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qualification_id')->nullable()->constrained();
            $table->string('unit_standard_title');
            $table->string('unit_standard_code');
            $table->string('minimum_required_hours');
            $table->longText('developed_by_stakeholders');
            $table->longText('validated_by_stakeholders')->nullable();
            $table->string('unit_standard_type');
            $table->string('validated');
            $table->string('status');
            $table->date('validation_date')->nullable();
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
        Schema::dropIfExists('unit_standards');
    }
}

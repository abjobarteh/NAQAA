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
            $table->string('unit_standard_title');
            $table->string('unit_standard_code');
            $table->string('minimum_required_hours');
            $table->longText('developed_by_stakeholders');
            $table->longText('validated_by_stakeholders')->nullable();
            $table->string('validated');
            $table->date('validation_date')->nullable();
            $table->foreignId('education_field_id')->nullable()->constrained('education_fields');
            $table->foreignId('education_sub_field_id')->nullable()->constrained('education_sub_fields');
            $table->foreignId('qualification_level_id')->nullable()->constrained('qualification_levels');
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

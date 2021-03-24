<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityAuditComplianceLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality_audit_compliance_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->text('description',100);
            $table->integer('percentage_start');
            $table->integer('percentage_end');
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
        Schema::dropIfExists('quality_audit_compliance_levels');
    }
}

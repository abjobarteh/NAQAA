<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('tuition_fee');
            $table->text('entry_requirements');
            $table->integer('duration');
            $table->longText('description')->nullable();
            $table->foreignId('qualification_level_id')->nullable()->constrained();
            $table->foreignId('education_field_id')->nullable()->constrained();
            $table->foreignId('education_sub_field_id')->nullable()->constrained();
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
        Schema::dropIfExists('qualifications');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammeDepartmentHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_department_heads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rank');
            $table->longText('highest_qualifications');
            $table->longText('other_qualifications');
            $table->longText('relevant_post_qualification_experience');
            $table->foreignId('programme_id')->nullable()->constrained('training_provider_programmes');
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
        Schema::dropIfExists('programme_department_heads');
    }
}

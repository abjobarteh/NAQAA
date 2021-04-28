<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsDataCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details_data_collections', function (Blueprint $table) {
            $table->id();
            $table->String('student_id')->nullable();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('phone');
            $table->string('gender');
            $table->string('nationality')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('programme');
            $table->string('attendance_status')->nullable();
            $table->date('admission_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->foreignId('qualification_at_entry')->nullable()->constrained('qualification_levels');
            $table->foreignId('award')->nullable()->constrained('qualification_levels');
            $table->foreignId('education_field_id')->nullable()->constrained();
            $table->foreignId('institution_id')->nullable()->constrained('institution_details_data_collections');
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
        Schema::dropIfExists('student_details_data_collections');
    }
}

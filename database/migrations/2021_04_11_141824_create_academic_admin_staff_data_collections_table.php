<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicAdminStaffDataCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_admin_staff_data_collections', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('gender');
            $table->string('nationality')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('job_title')->nullable();
            $table->string('salary_per_month')->nullable();
            $table->string('employment_date')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->longText('other_qualifications')->nullable();
            $table->string('specialisation');
            $table->string('main_teaching_field_of_study');
            $table->longText('secondary_teaching_fields_of_study')->nullable();
            $table->foreignId('rank_id')->nullable()->constrained('training_provider_staffs_ranks');
            $table->foreignId('role_id')->nullable()->constrained('training_provider_staffs_roles');
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
        Schema::dropIfExists('academic_admin_staff_data_collections');
    }
}

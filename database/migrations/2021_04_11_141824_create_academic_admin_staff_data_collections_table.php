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
            $table->string('qualifications')->nullable();
            $table->string('specialisation');
            $table->string('main_teaching_field_of_study');
            $table->string('secondary_teaching_fields_of_study')->nullable();
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

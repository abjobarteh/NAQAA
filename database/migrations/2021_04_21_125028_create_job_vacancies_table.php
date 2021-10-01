<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_advertised_id')->nullable()->constrained('position_advertiseds');
            $table->integer('minimum_required_job_experience')->nullable();
            $table->string('minimum_required_qualification')->nullable();
            $table->longText('fields_of_study');
            $table->string('occupational_group')->nullable();
            $table->string('job_status')->nullable();
            $table->string('institution')->nullable();
            $table->string('employer_type')->nullable();
            $table->date('date_advertised')->nullable();
            $table->string('programme')->nullable();
            $table->string('education_level')->nullable();
            $table->string('major_occupational_area')->nullable();
            $table->string('industrial_sector')->nullable();
            $table->foreignId('region_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('localgoverment_area_id')->nullable()->constrained('local_goverment_areas');
            $table->foreignId('jobvacancy_category_id')->nullable()->constrained('job_vacancy_categories');
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
        Schema::dropIfExists('job_vacancies');
    }
}

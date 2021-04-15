<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_surveys', function (Blueprint $table) {
            $table->id();
            $table->string('research_topic');
            $table->text('purpose');
            $table->string('name_of_authors');
            $table->text('key_findings');
            $table->text('recommendation');
            $table->string('publisher');
            $table->date('publication_date');
            $table->string('funded_by');
            $table->double('cost');
            $table->text('remarks');
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
        Schema::dropIfExists('research_surveys');
    }
}

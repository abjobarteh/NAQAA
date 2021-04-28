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
            $table->text('research_topic');
            $table->longText('purpose');
            $table->text('name_of_authors');
            $table->longText('key_findings');
            $table->longText('recommendation');
            $table->text('publisher');
            $table->date('publication_date');
            $table->string('funded_by');
            $table->double('cost');
            $table->longText('remarks');
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

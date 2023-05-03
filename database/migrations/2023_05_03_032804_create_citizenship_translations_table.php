<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizenshipTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizenship_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('citizenship_id');
            $table->text('title')->nullable();
            $table->text('banner_text')->nullable();
            $table->text('main_button_link')->nullable();
            $table->text('main_button_text')->nullable();
            $table->text('extra_button_link')->nullable();
            $table->text('extra_button_text')->nullable();
            $table->text('file')->nullable();
            $table->text('overview_title')->nullable();
            $table->text('overview_desc')->nullable();
            $table->text('overview_first_title')->nullable();
            $table->text('overview_first_desc')->nullable();
            $table->text('overview_second_title')->nullable();
            $table->text('overview_second_desc')->nullable();
            $table->text('overview_third_title')->nullable();
            $table->text('overview_third_desc')->nullable();
            $table->text('obtaining_text')->nullable();
            $table->text('acquisition_text')->nullable();
            $table->text('documents_text')->nullable();
            $table->text('stages_text')->nullable();
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
        Schema::dropIfExists('citizenship_translations');
    }
}

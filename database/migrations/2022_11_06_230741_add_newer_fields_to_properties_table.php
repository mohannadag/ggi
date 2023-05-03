<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewerFieldsToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->string('landscape')->nullable();
            $table->string('season')->nullable();
            $table->integer('week')->nullable();
            $table->string('view')->nullable();
            $table->string('available_floors')->nullable();
            $table->string('balcony')->nullable();
            $table->string('heating')->nullable();
            $table->string('emptiness')->nullable();
            $table->string('maintenance_fee')->nullable();
            $table->boolean('creditability')->nullable();
            $table->string('building_age')->nullable();
            $table->string('units_infloors')->nullable();
            $table->string('convertability')->nullable();
            $table->string('total_units')->nullable();
            $table->integer('title_deed_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

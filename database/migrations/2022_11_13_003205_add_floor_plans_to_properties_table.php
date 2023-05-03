<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFloorPlansToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->string('first_floor_title')->nullable();
            $table->integer('first_floor_size')->nullable();
            $table->integer('first_floor_rooms')->nullable();
            $table->integer('first_floor_baths')->nullable();
            $table->integer('first_floor_price')->nullable();
            $table->string('first_floor_picture')->nullable();
            $table->string('first_floor_description')->nullable();
            $table->string('second_floor_title')->nullable();
            $table->integer('second_floor_size')->nullable();
            $table->integer('second_floor_rooms')->nullable();
            $table->integer('second_floor_baths')->nullable();
            $table->integer('second_floor_price')->nullable();
            $table->string('second_floor_picture')->nullable();
            $table->string('second_floor_description')->nullable();
            $table->string('third_floor_title')->nullable();
            $table->integer('third_floor_size')->nullable();
            $table->integer('third_floor_rooms')->nullable();
            $table->integer('third_floor_baths')->nullable();
            $table->integer('third_floor_price')->nullable();
            $table->string('third_floor_picture')->nullable();
            $table->string('third_floor_description')->nullable();
            $table->string('fourth_floor_title')->nullable();
            $table->integer('fourth_floor_size')->nullable();
            $table->integer('fourth_floor_rooms')->nullable();
            $table->integer('fourth_floor_baths')->nullable();
            $table->integer('fourth_floor_price')->nullable();
            $table->string('fourth_floor_picture')->nullable();
            $table->string('fourth_floor_description')->nullable();
            $table->string('fifth_floor_title')->nullable();
            $table->integer('fifth_floor_size')->nullable();
            $table->integer('fifth_floor_rooms')->nullable();
            $table->integer('fifth_floor_baths')->nullable();
            $table->integer('fifth_floor_price')->nullable();
            $table->string('fifth_floor_picture')->nullable();
            $table->string('fifth_floor_description')->nullable();
            $table->string('sixth_floor_title')->nullable();
            $table->integer('sixth_floor_size')->nullable();
            $table->integer('sixth_floor_rooms')->nullable();
            $table->integer('sixth_floor_baths')->nullable();
            $table->integer('sixth_floor_price')->nullable();
            $table->string('sixth_floor_picture')->nullable();
            $table->string('sixth_floor_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_details', function (Blueprint $table) {
            //
        });
    }
}

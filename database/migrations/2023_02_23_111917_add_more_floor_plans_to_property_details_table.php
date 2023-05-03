<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFloorPlansToPropertyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->text('seventh_floor_title')->nullable();
            $table->text('seventh_floor_size')->nullable();
            $table->text('seventh_floor_rooms')->nullable();
            $table->text('seventh_floor_baths')->nullable();
            $table->decimal('seventh_floor_price')->nullable();
            $table->text('seventh_floor_picture')->nullable();
            $table->text('seventh_floor_description')->nullable();
            $table->text('eighth_floor_title')->nullable();
            $table->text('eighth_floor_size')->nullable();
            $table->text('eighth_floor_rooms')->nullable();
            $table->text('eighth_floor_baths')->nullable();
            $table->decimal('eighth_floor_price')->nullable();
            $table->text('eighth_floor_picture')->nullable();
            $table->text('eighth_floor_description')->nullable();
            $table->text('ninth_floor_title')->nullable();
            $table->text('ninth_floor_size')->nullable();
            $table->text('ninth_floor_rooms')->nullable();
            $table->text('ninth_floor_baths')->nullable();
            $table->decimal('ninth_floor_price')->nullable();
            $table->text('ninth_floor_picture')->nullable();
            $table->text('ninth_floor_description')->nullable();
            $table->text('tenth_floor_title')->nullable();
            $table->text('tenth_floor_size')->nullable();
            $table->text('tenth_floor_rooms')->nullable();
            $table->text('tenth_floor_baths')->nullable();
            $table->decimal('tenth_floor_price')->nullable();
            $table->text('tenth_floor_picture')->nullable();
            $table->text('tenth_floor_description')->nullable();
            $table->text('eleventh_floor_title')->nullable();
            $table->text('eleventh_floor_size')->nullable();
            $table->text('eleventh_floor_rooms')->nullable();
            $table->text('eleventh_floor_baths')->nullable();
            $table->decimal('eleventh_floor_price')->nullable();
            $table->text('eleventh_floor_picture')->nullable();
            $table->text('eleventh_floor_description')->nullable();
            $table->text('twelfth_floor_title')->nullable();
            $table->text('twelfth_floor_size')->nullable();
            $table->text('twelfth_floor_rooms')->nullable();
            $table->text('twelfth_floor_baths')->nullable();
            $table->decimal('twelfth_floor_price')->nullable();
            $table->text('twelfth_floor_picture')->nullable();
            $table->text('twelfth_floor_description')->nullable();
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

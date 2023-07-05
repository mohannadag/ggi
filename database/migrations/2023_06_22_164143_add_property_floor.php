<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropertyFloor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_floors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_details_id');
            $table->unsignedBigInteger('unit_id');
            $table->integer('baths')->default(0);
            $table->string('note_ar');
            $table->string('note_en');
            $table->string('ivr_link');
            $table->double('min_price')->default(0);
            $table->double('max_price')->default(0);
            $table->decimal('min_size')->default(0);
            $table->decimal('max_size')->default(0);
            $table->string('image');
            $table->boolean('is_sold')->default(false);
            $table->timestamps();

            $table->foreign('property_details_id')
                ->references('id')->on('property_details')->onDelete('cascade');
            // $table->foreign('unit_id')
            //     ->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_floors');
    }
}

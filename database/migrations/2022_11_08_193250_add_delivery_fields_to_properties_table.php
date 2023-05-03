<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryFieldsToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->string('delivery_month')->nullable();
            $table->integer('deliver_year')->nullable();
            $table->string('payment_options')->nullable();
            $table->integer('installment_months')->nullable();
            $table->string('inside_project')->nullable();
            $table->integer('island_no')->nullable();
            $table->integer('sheet_no')->nullable();
            $table->integer('precedent_value')->nullable();
            $table->integer('gauge')->nullable();

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

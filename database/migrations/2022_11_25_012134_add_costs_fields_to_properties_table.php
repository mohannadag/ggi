<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostsFieldsToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->string('purchase_vat')->nullable();
            $table->string('title_deed_status')->nullable();
            $table->string('title_deed_cost')->nullable();
            $table->string('notary_fees')->nullable();
            $table->string('valuation_cost')->nullable();
            $table->string('annual_tax')->nullable();
            $table->string('min_downpayment')->nullable();
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

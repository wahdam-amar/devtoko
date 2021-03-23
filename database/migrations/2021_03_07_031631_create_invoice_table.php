<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockHistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->string('invoice_no', 100);
            $table->dateTime('invoice_date')->nullable()->default(now());
            $table->dateTime('invoice_due')->nullable()->default(now());
            $table->unsignedInteger('supplier_id');
            $table->bigInteger('amount');
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->timestamps();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_hist');
    }
}

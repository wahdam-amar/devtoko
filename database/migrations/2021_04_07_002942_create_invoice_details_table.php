<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->string('invoice_no');
            $table->unsignedInteger('stock_id');
            $table->integer('quantity')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('stock_id')->references('id')->on('stock');
            $table->foreign('invoice_no')->references('no')->on('invoice');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            // $table->primary('no');
            $table->index(['invoice_no', 'stock_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}

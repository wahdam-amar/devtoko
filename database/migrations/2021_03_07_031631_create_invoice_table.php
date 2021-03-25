<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->string('no', 100);
            $table->date('date')->nullable()->default(now());
            $table->date('due')->nullable()->default(now());
            $table->string('status', 3)->default('AC');
            // $table->unsignedInteger('supplier_id');
            $table->bigInteger('amount');
            // $table->foreign('supplier_id')->references('id')->on('supplier');
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
        Schema::dropIfExists('invoice');
    }
}

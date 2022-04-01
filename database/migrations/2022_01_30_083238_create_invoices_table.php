<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parmeter_id');
            $table->foreign('parmeter_id')->references('id')->on('invoice_parameters')->onDelete('cascade');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('invoice_number', 50);
            $table->date('invoice_date');
            $table->date('payment_date')->nullable();
            $table->enum('status', ['paid','unpaid','partially_paid'])->default('unpaid');
            $table->decimal('discount_value',8,2);
            $table->decimal('shipping_value',8,2);
            $table->decimal('tva_value',8,2);
            $table->decimal('total',8,2);
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
        Schema::dropIfExists('invoices');
    }
}

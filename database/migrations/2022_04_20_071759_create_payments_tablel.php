<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTablel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_tablel', function (Blueprint $table) {
            $table->id('payment_id');
            $table->integer('customer_id');
            $table->integer('order_id');
            $table->string('payment_type');
            $table->string('remaining_amount');
            $table->string('amount_paid');
            $table->string('balance_due');
            $table->string('note');
            $table->date('payment_date');
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
        Schema::dropIfExists('payments_tablel');
    }
}

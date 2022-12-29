<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id('bank_id');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('IFSC_code');
            $table->string('bank_name');
            $table->string('account_hold_name');
            $table->string('bank_address');
            $table->date('bank_date');
            $table->integer('customer_id');
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
        Schema::dropIfExists('bank_details');
    }
}

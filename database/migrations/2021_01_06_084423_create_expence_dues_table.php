<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenceDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expence_dues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('expence_payment_id');
            $table->integer('due_amount');
            $table->integer('pay_amount');
            $table->date('payment_date');
            $table->integer('status');
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
        Schema::dropIfExists('expence_dues');
    }
}

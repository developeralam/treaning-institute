<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chart_of_account_id');
            $table->unsignedBigInteger('expense_id');
            $table->text('description');
            $table->double('amount', 10, 2);
            $table->timestamps();

            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts');
            $table->foreign('expense_id')->references('id')->on('expenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_charts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
         
            $table->string('name',80)->nullable()->change();
            $table->text('description',800)->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('services', function (Blueprint $table) {
            $table->renameColumnrenameColumn('name','name');
            $table->renameColumn('description','description');
        });
    }
}

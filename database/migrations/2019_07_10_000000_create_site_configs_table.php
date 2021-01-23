<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('image')->nullable();
            $table->string('logo')->nullable();
            $table->string('address');
            $table->string('phone_number1');
            $table->string('phone_number2')->nullable($value = true);
            $table->string('email');
            $table->text('faviconImage')->nullable();
            $table->string('facebook')->nullable($value = true);
            $table->text('google_map',600)->nullable($value = true);
            $table->text('about_us');
            $table->string('code', 20);
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
        Schema::dropIfExists('site_configs');
    }
}

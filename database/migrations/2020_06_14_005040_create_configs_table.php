<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dashboard')->nullable();
            $table->string('welcome')->nullable();
            $table->string('tables')->nullable();
            $table->string('index')->nullable();
            $table->string('nosotros1')->nullable();
            $table->string('nosotros2')->nullable();
            $table->string('nosotros3')->nullable();
            $table->string('nosotros4')->nullable();
            $table->string('contact')->nullable();
            $table->string('otro')->nullable();
            $table->string('color')->nullable();
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
        Schema::dropIfExists('configs');
    }
}

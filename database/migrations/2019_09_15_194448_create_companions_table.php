<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guest_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('lastName')->nullable();
            $table->string('secondLastName')->nullable();
            $table->enum('genere', ['H', 'M'])->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('dataX')->nullable();
            $table->string('dataY')->nullable();
            $table->boolean('seated')->nullable();
            $table->integer('tableName')->unsigned()->nullable();
            $table->enum('status', ['CONFIRMADO', 'PENDIENTE', 'CANCELADO'])->default('PENDIENTE')->nullable();
            $table->timestamps();

            //Relation
            $table->foreign('guest_id')->references('id')->on('guests')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tableName')->references('id')->on('number_tables')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companions');
    }
}

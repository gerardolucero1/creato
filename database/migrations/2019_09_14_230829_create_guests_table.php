<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guestList_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('lastName')->nullable();
            $table->string('secondLastName')->nullable();
            $table->enum('genere', ['MALE', 'FEMALE'])->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('guests')->nullable();
            $table->string('dataX')->nullable();
            $table->string('dataY')->nullable();
            $table->boolean('seated')->nullable();
            $table->enum('status', ['CONFIRMADO', 'PENDIENTE', 'CANCELADO'])->nullable();
            $table->enum('origin', ['NOVIA', 'NOVIO']);
            $table->string('tableName')->nullable();
            $table->timestamps();

            //Relation
            $table->foreign('guestList_id')->references('id')->on('guest_lists')
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
        Schema::dropIfExists('guests');
    }
}

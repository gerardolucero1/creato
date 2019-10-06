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
            $table->string('name');
            $table->string('lastName');
            $table->string('secondLastName');
            $table->enum('genere', ['MALE', 'FEMALE']);
            $table->string('email');
            $table->string('phone');
            $table->integer('guests');
            $table->string('dataX')->nullable();
            $table->string('dataY')->nullable();
            $table->boolean('seated')->nullable();
            $table->enum('status', ['CONFIRMADO', 'PENDIENTE', 'CANCELADO']);
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

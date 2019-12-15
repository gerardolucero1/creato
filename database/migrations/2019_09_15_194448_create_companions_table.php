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
            $table->string('name');
            $table->string('lastName');
            $table->string('secondLastName');
            $table->enum('genere', ['MALE', 'FEMALE']);
            $table->string('email');
            $table->string('phone');
            $table->string('dataX')->nullable();
            $table->string('dataY')->nullable();
            $table->boolean('seated')->nullable();
            $table->string('tableName')->nullable();
            $table->enum('status', ['CONFIRMADO', 'PENDIENTE', 'CANCELADO']);
            $table->timestamps();

            //Relation
            $table->foreign('guest_id')->references('id')->on('guests')
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

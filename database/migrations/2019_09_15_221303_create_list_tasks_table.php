<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
    {
        Schema::create('list_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blockList_id')->unsigned();
            $table->string('slug');
            $table->string('name');
            $table->timestamps();

            $table->foreign('blockList_id')->references('id')->on('block_lists')
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
        Schema::dropIfExists('list_tasks');
    }
}

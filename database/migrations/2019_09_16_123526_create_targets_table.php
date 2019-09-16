<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 32)->unique();
            $table->string('first_name', 16);
            $table->string('last_name', 24);
            $table->bigInteger('target_group_id')->unsigned();
            $table->timestamps();

            $table->foreign('target_group_id')->references('id')->on('target_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('targets');
    }
}

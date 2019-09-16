<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailSpearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_spear', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('email_id')->unsigned();
            $table->bigInteger('spear_id')->unsigned();
            $table->timestamps();

            $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
            $table->foreign('spear_id')->references('id')->on('spears')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_spear');
    }
}

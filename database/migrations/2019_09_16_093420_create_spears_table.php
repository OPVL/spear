<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spears', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('target_id')->unsigned();
            $table->string('hash', 60);
            $table->boolean('success')->default(false);
            $table->timestamps();

            $table->foreign('target_id')->references('id')->on('targets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spears');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');

            //FK
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id')->on('students')->onDelte("cascade");

            //FK
            $table->unsignedBigInteger('id_price');
            $table->foreign('id_price')->references('id')->on('prices')->onDelte("cascade");

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
        Schema::dropIfExists('payments');
    }
}

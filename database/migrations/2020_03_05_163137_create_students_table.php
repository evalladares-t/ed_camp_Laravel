<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name',255);
            $table->String('lastname',255);
            $table->String('email',255)->unique();
            $table->enum('state',['Paid','Pending'])->default('Pending');
            $table->boolean('peruvian');
            $table->boolean('assistance');
            $table->String('phone',15);

            //FK
            $table->unsignedBigInteger('id_company');
            $table->foreign('id_company')->references('id')->on('companies')->onDelte("cascade");
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
        Schema::dropIfExists('students');
    }
}

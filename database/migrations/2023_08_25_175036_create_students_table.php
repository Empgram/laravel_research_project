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
            $table->string('studentlrn')->primary(); // Non-auto-incrementing primary key
            $table->string('studentname');
            $table->string('address');
            $table->string('contact');
            $table->string('section');
            $table->string('grade');
            $table->integer('age');
            $table->string('guardianname');
            $table->string('guardianphone');
            $table->string('guardianemail');
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


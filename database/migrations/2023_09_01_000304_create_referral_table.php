<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateStudentReferralTable extends Migration
{
    public function up()
    {
        Schema::create('referral', function (Blueprint $table) {
        
            $table->string('student_name');
            $table->string('studentlrn');
            $table->string('form_id');
            $table->string('reason');
            $table->string('state');
            $table->date('referral_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('referral');
    }
}


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidanceReportsTable extends Migration
{
    public function up()
    {
        Schema::create('guidance_reports', function (Blueprint $table) {
           
            $table->id();
            $table->string('form_id')->unique();
            $table->string('reason');
            $table->string('perpetrator_lrn');
            $table->string('perpetrator_name');
            $table->string('violation_type');
            $table->string('student_lrn');
            $table->string('student_name');
            $table->string('parent_contacted');
            $table->string('teacher_name');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guidance_reports');
    }
}


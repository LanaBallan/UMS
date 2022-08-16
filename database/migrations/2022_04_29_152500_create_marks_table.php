<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->bigInteger('subject_id');
            $table->bigInteger('employee_id');
            $table->Integer('practical_mark')->default(0);
            $table->Integer('theoretical_mark')->default(0);
            $table->Integer('total_mark');
            $table->year('year');
            $table->Integer('semester');
            $table->enum('status', ['نجاح','رسوب']);
            $table->boolean('confirmed');
            $table->date('time_insert_parc')->nullable();
            $table->date('time_insert_theo')->nullable();
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
        Schema::dropIfExists('marks');
    }
}

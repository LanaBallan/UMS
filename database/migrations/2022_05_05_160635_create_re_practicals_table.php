<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRePracticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('re_practicals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->bigInteger('subject_id');
            $table->Integer('practical_mark')->default(null);
            $table->Integer('theoretical_mark')->default(null);
            $table->Integer('total_mark');
            $table->year('year');
            $table->Integer('semester');
            $table->enum('status', ['نجاح','رسوب']);
            $table->date('time_insert_parc')->default(null);
            $table->date('time_insert_theo')->default(null);
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
        Schema::dropIfExists('re_practicals');
    }
}

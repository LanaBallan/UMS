<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectionReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objection_reqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status');
            $table->enum('type', ['practical','theoretical']);
            $table->integer('new_mark');
            $table->bigInteger('student_id');
            $table->bigInteger('subject_id');
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
        Schema::dropIfExists('objection_reqs');
    }
}

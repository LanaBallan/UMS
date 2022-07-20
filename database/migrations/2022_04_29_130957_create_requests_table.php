<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->boolean('status');//true can read ,,, false cannot read
            $table->bigInteger('student_id');
            $table->integer('current_year');
            $table->binary('acquittal_from_the_university')->nullable();//مصدقة تخرج
            $table->binary('acquittal_from_housing')->nullable(); // مصدقة تخرج
            $table->binary('Clearance_of_credit_of_credit')->nullable(); // مصدقة تخرج
            $table->binary('donate_blood')->nullable();
            $table->binary('Delivering_financial')->nullable();
            $table->binary('photo_card')->nullable();
            $table->binary('photo_id')->nullable();
            $table->binary('arrived_registration')->nullable();
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
        Schema::dropIfExists('requests');
    }
}

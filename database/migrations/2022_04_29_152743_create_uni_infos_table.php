<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uni_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->Year('year');
            $table->enum('current_year',[1,2,3,4,5]);
            $table->Integer('total_failed_year');
            $table->enum('status', ['منقول','ناجح','راسب']);
            $table->enum('specialization', ['برمجيات','ذكاء','شبكات','علوم اساسية']);
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
        Schema::dropIfExists('uni_infos');
    }
}

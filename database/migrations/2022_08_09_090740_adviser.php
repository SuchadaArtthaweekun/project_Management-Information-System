<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Adviser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisers', function (Blueprint $table) {
            $table->increments('adviser_id');
            $table->string('name_prefix_th');
            $table->string('name_prefix_eng');
            $table->string('adviser_fullname_th');
            $table->string('adviser_fullname_en');
            $table->string('adviser_tel');
            $table->string('adviser_email')->unique();
            $table->unsignedInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('projects')->on('projects')->onDelete('setnull')->onUpdate('setnull');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdviserLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('adviser_lists', function (Blueprint $table) {
            $table->increments('adlists_id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('adviser_id');
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('setnull')->onUpdate('setnull');
            $table->foreign('adviser_id')->references('adviser_id')->on('advisers')->onDelete('setnull')->onUpdate('setnull');
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

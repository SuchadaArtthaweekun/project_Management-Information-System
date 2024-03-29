<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('author');
            $table->string('co_auther')-> nullable();
            $table->string('title_th');
            $table->string('title_en')->nullable();
            $table->string('edition')->nullable();
            $table->string('abtract')->nullable();
            $table->string('adviser');
            $table->string('co_adviser')-> nullable();
            $table->string('branch')->nullable();
            $table->boolean('published');
            $table->integer('view_counter');
            $table->unsignedInteger('cate_id')->unsigned();
            $table->foreign('cate_id')->references('cate_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id')->unsigned();
            $table->foreign('id')->references('id')->on('users')->onDelete('setnull')->onUpdate('setnull');
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

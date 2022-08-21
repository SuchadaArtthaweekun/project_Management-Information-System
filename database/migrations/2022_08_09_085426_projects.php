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
            $table->string('title_en');
            $table->string('edition');
            $table->string('article');
            $table->string('abtract');
            $table->string('adviser');
            $table->string('co_adviser')-> nullable();
            $table->string('branch');
            $table->boolean('published');
            $table->integer('view_counter');
            $table->unsignedInteger('cate_id')->unsigned;
            $table->foreign('cate_id')->references('cate_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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

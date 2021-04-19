<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutSolacersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_solacers', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement()->unique();
            $table->string('heading');
            $table->string('description');
            $table->string('file1');
            $table->string('file2');
            $table->string('file3');
            $table->string('added_by');
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
        Schema::dropIfExists('about_solacers');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_products', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->autoIncrement();
            $table->string('name');
            $table->integer('price');
            $table->integer('max_size');
            $table->integer('min_size');
            $table->integer('size_5_type');
            $table->string('max_age');
            $table->string('min_age');
            $table->string('age_type');
            $table->integer('product_type');
            $table->integer('fabric');
            $table->string('description');
            $table->string('file1');
            $table->string('file2');
            $table->string('file3');
            $table->string('file4');
            $table->string('file5');
            $table->string('file6');
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
        Schema::dropIfExists('all_products');
    }
}

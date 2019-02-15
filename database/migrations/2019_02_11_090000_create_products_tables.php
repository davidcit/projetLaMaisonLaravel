<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->text('description',100);
            $table->decimal('price',8,2);
            $table->enum('size',['46','48','50','52']);
            $table->string('url_image',100)->nullable();
            $table->enum('status',['publier','brouillon']);
            $table->enum('code',['solde','new']);
            $table->string('reference',100);
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
        Schema::dropIfExists('products');
    }
}

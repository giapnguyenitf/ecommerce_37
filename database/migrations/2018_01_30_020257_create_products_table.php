<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
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
            $table->string('category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->integer('price');
            $table->float('discount')->default(config('setting.not_discount'));
            $table->float('star_rating')->default(config('setting.five_stars'));
            $table->boolean('status')->default(config('setting.publish'));
            $table->string('manufacturer')->nullable();
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

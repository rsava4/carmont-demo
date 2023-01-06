<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecdoc_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('supplier_id');
            $table->string('sku', 32);
            $table->string('found_string', 32);
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('image', 255)->nullable();

            $table->integer('product_id')->default(0);

            $table->index(['found_string', 'supplier_id'], 'article');
            $table->index('supplier_id');
            $table->unique(['slug', 'supplier_id'], 'slug_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}

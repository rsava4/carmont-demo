<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecdocArticleToModsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecdoc_article_to_mods_categories', function (Blueprint $table) {
            $table->integer('article_id');
            $table->mediumInteger('category_id');
            $table->mediumInteger('seo_modification_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecdoc_article_to_mods_categories');
    }
}

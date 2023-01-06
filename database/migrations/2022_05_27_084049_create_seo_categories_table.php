<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_categories', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->mediumInteger('n_left');
            $table->mediumInteger('n_right');
            $table->tinyInteger('n_level')->default(0);
            $table->mediumInteger('parent_id');
            $table->string('image', 255)->nullable();
            $table->boolean('is_active')->default(0);
            $table->boolean('is_popular')->default(0);
            $table->boolean('has_products')->default(0);
            $table->mediumInteger('position')->default(0);

            $table->index(['n_left', 'n_right', 'n_level'], 'nested');
            $table->index('slug', 'category_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_categories');
    }
}

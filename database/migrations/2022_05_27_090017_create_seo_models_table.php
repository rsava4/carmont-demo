<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_models', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 128);
            $table->string('slug', 255);
            $table->boolean('is_off')->default(0);
            $table->string('image')->nullable();
            $table->smallInteger('seo_maker_id');

            $table->index('seo_maker_id', 'maker');
            $table->index('slug', 'models_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_models');
    }
}

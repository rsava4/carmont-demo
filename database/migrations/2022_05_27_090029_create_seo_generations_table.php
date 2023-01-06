<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_generations', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 128);
            $table->string('fullname', 255);
            $table->string('slug', 255);
            $table->string('body_type');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('image')->nullable();
            $table->smallInteger('seo_model_id');

            $table->index('slug', 'generations_slug');
            $table->index('seo_model_id', 'model');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_generations');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_modifications', function (Blueprint $table) {
            $table->mediumInteger('id');
            $table->string('name', 128);
            $table->string('fullname', 255)->nullable();
            $table->string('construction_interval', 24)->nullable();
            $table->string('image', 255)->nullable();
            $table->json('attributes');
            $table->mediumInteger('seo_generation_id');

            $table->index('seo_generation_id', 'generation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_modifications');
    }
}

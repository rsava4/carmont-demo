<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_makers', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 64);
            $table->string('name_ru', 128)->nullable();
            $table->string('slug', 64);
            $table->boolean('is_off')->default(0);
            $table->boolean('is_popular')->default(0);
            $table->string('image', 255);

            $table->index('slug', 'makers_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_makers');
    }
}

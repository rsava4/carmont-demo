<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoRoutedModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_car_routes', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->timestamps();
            $table->tinyInteger('routable_type');
            $table->integer('routable_id');
            $table->string('slug', 255);
            $table->string('path', 255);

            $table->unique('path', 'path');
            $table->unique('slug', 'slug');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_car_routes');
    }
}

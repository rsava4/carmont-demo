<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteMetaTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_meta_templates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedMediumInteger('route_id');
            $table->json('meta');
            $table->text('top_page_content')->nullable();
            $table->text('bottom_page_content')->nullable();
            $table->text('empty_result_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_meta_templates');
    }
}

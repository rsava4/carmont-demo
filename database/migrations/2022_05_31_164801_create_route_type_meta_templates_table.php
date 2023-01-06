<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteTypeMetaTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_type_meta_templates', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->timestamps();
            $table->tinyInteger('routable_type');
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
        Schema::dropIfExists('route_type_meta_templates');
    }
}

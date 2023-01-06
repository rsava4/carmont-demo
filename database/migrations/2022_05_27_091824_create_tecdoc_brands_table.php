<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecdocBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecdoc_brands', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 32);
            $table->string('name_ru', 64)->nullable();
            $table->string('slug', 32);
            $table->smallInteger('supplier_id')->default(0);
            $table->string('country')->nullable();
            $table->boolean('is_visible')->default(0);

            $table->unique('slug', 'tecdoc_brands_slug');
            $table->index('supplier_id', 'supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecdoc_brands');
    }
}

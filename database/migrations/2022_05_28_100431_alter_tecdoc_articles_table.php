<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTecdocArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tecdoc_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('userpart_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tecdoc_articles', function (Blueprint $table) {
            $table->dropColumn('userpart_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_contents', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->foreign('article_id')->on('articles')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('article_categories', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->foreign('article_id')->on('articles')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('readers', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->foreign('article_id')->on('articles')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

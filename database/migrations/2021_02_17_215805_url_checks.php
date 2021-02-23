<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UrlChecks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('url_checks')) {
            Schema::create('url_checks', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('url_id');
                $table->foreign('url_id')->references('id')->on('urls');
                $table->integer('status_code');
                $table->string('h1')->nullable();
                $table->string('keywords')->nullable();
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('url_checks');
    }
}

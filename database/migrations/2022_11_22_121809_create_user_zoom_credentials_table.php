<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserZoomCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_zoom_credentials', function (Blueprint $table) {
            $table->id();
				$table->string('user_id');
            $table->string('name');
            $table->string('api_url');
            $table->string('api_key');
            $table->string('api_secret');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_zoom_credentials');
    }
}

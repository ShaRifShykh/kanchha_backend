<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout_images', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->unsignedBigInteger("checkout_service_id");
        });

        Schema::table('checkout_images', function (Blueprint $table) {
            $table->foreign("checkout_service_id")->references("id")->on("checkout_services");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout_images');
    }
};

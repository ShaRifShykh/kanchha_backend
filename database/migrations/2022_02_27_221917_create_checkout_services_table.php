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
        Schema::create('checkout_services', function (Blueprint $table) {
            $table->id();
            $table->string("instructions");
            $table->string("timing_slot");
            $table->dateTime("date_slot");
            $table->string("total_price");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("service_id");
            $table->timestamps();
        });

        Schema::table('checkout_services', function (Blueprint $table) {
            $table->foreign("service_id")->references("id")->on("services");
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
        Schema::dropIfExists('checkout_services');
    }
};

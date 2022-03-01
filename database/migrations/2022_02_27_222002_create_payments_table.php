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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("amount");
            $table->string("payment_method");
            $table->string("status");
            $table->unsignedBigInteger("checkout_service_id");
            $table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign("checkout_service_id")->references("id")->on("checkout_services");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};

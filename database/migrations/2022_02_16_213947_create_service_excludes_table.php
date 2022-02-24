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
        Schema::create('service_excludes', function (Blueprint $table) {
            $table->id();
            $table->string("excludes");
            $table->unsignedBigInteger("service_id");
        });

        Schema::table('service_excludes', function (Blueprint $table) {
            $table->foreign("service_id")->references("id")->on("services");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_excludes');
    }
};

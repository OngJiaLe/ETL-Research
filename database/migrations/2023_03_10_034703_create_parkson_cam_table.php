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
        Schema::create('parkson_cam', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Sales Date')->nullable();
            $table->string('Store')->nullable();
            $table->string('Net-Net Sales (Excl GST)')->nullable();
            $table->string('Qty Sold')->nullable();
            $table->string('POS Discount')->nullable();
            $table->string('Returned Sales')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkson_cam');
    }
};

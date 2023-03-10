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
        Schema::create('parkson_cag', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('Sales Date')->nullable();
            $table->String('Store')->nullable();
            $table->String('Net-Net Sales (Excl GST)')->nullable();
            $table->String('Qty Sold')->nullable();
            $table->String('POS Discount')->nullable();
            $table->String('Returned Sales')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkson_cag');
    }
};

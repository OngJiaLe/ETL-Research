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
        Schema::create('sogos_cag', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('VENDORCODE')->nullable();
            $table->string('VENDORNAME')->nullable();
            $table->string('STORECODE')->nullable();
            $table->string('STORENAME')->nullable();
            $table->string('SALESDATE')->nullable();
            $table->string('DEPTCODE')->nullable();
            $table->string('DEPTNAME')->nullable();
            $table->string('BRANDCODE')->nullable();
            $table->string('BRANDNAME')->nullable();
            $table->string('ITEMCODE')->nullable();
            $table->string('ITEMNAME')->nullable();
            $table->string('UNITPRICE')->nullable();
            $table->string('NETQTY')->nullable();
            $table->string('RETURNEDQTY')->nullable();
            $table->string('NETAMOUNT')->nullable();
            $table->string('COSTRATE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sogos_cag');
    }
};

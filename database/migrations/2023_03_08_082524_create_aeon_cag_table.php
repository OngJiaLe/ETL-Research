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
        Schema::create('aeon_cag', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('BUYERORGID')->nullable();
            $table->string('STORE CODE')->nullable();
            $table->string('STORE NAME')->nullable();
            $table->string('CONTRACT NO')->nullable();
            $table->string('SELLING DATE')->nullable();
            $table->string('DEPARTMENT CODE')->nullable();
            $table->string('DEPARTMENT DESCRIPTION')->nullable();
            $table->string('CATEGORY CODE')->nullable();
            $table->string('CATEGORY DESCRIPTION')->nullable();
            $table->string('ITEM CODE')->nullable();
            $table->string('ITEM DESCRIPTION')->nullable();
            $table->string('TOTAL SALES')->nullable();
            $table->string('SALES QTY')->nullable();
            $table->string('TOTAL SALES EXCL GST')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aeon_cag');
    }
};

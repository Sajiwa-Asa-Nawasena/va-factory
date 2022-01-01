<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomeJerseys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custome_jerseys', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jenis');
            $table->string('kode_bahan');
            $table->string('email');
            $table->string('no_wa');
            $table->string('nama');
            $table->integer('qty');
            $table->integer('satuan');
            $table->integer('total');
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
        Schema::dropIfExists('custome_jerseys');
    }
}

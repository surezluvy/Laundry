<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Layanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id('layanan_id')->autoIncrement();
            $table->foreignId('laundry_id');
            $table->foreign('laundry_id')->references('laundry_id')->on('laundries')->onDelete('cascade');
            $table->text('nama');
            $table->string('harga');
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
        //
    }
}

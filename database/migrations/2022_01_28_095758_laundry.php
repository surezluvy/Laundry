<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laundry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundries', function (Blueprint $table) {
            $table->id('laundry_id')->autoIncrement();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('laundry_name');
            $table->string('laundry_description');
            $table->text('laundry_address');
            $table->text('laundry_address_detail');
            $table->integer('laundry_price');
            $table->string('laundry_open');
            $table->enum('status', ['Belum dikonfirmasi', 'Sudah dikonfirmasi'])->default('Belum dikonfirmasi');
            $table->string('laundry_lat')->nullable();
            $table->string('laundry_long')->nullable();
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
        Schema::dropIfExists('laundries');
    }
}

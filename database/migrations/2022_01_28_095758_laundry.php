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
            $table->foreignId('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admins');
            $table->string('laundry_name');
            $table->string('laundry_description');
            $table->text('laundry_address');
            $table->text('laundry_address_detail');
            $table->integer('laundry_price');
            $table->string('laundry_open');
            $table->string('laundry_lat');
            $table->string('laundry_long');
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

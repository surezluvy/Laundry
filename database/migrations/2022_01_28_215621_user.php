<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id')->autoIncrement();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->text('address')->nullable();
            $table->text('address_detail')->nullable();
            $table->enum('level', ['customer', 'mitra', 'admin'])->default('customer');
            $table->string('password');
            $table->string('user_lat')->nullable();
            $table->string('user_long')->nullable();
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
        Schema::dropIfExists('users');
    }
}

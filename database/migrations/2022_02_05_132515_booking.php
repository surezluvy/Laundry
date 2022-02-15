<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Laundry;
use App\Models\User;

class Booking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id')->autoIncrement();
            $table->foreignId('laundry_id');
            $table->foreign('laundry_id')->references('laundry_id')->on('laundries');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('metode');
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu');
            $table->string('subtotal');
            $table->integer('weight')->nullable();
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

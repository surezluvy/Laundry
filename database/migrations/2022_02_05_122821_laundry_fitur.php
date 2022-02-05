<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Laundry;

class LaundryFitur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundry_fiturs', function (Blueprint $table) {
            $table->id('laundryFitur_id')->autoIncrement();
            $table->foreignId('laundry_id');
            $table->foreign('laundry_id')->references('laundry_id')->on('laundries');
            $table->string('laundryFitur_name');
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

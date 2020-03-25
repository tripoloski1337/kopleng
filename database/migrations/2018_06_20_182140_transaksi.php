<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //disini masi bingung
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->string('id_chart');
            $table->string('id_user');
            $table->string('uang_bayar');
            $table->string('total_bayar');
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

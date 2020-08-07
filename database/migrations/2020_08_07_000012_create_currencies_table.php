<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->decimal('jual', 15, 2);
            $table->decimal('beli', 15, 2);
            $table->decimal('diskon', 15, 2)->nullable();
            $table->string('no_currency')->nullable();
            $table->string('nama_currency')->nullable();
            $table->integer('min_trans')->nullable();
            $table->integer('max_trans')->nullable();
            $table->string('status')->nullable();
            $table->string('jenis');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

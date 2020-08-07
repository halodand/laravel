<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankusersTable extends Migration
{
    public function up()
    {
        Schema::create('bankusers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_rekening');
            $table->string('atas_nama');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

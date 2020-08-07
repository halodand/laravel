<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyUsersTable extends Migration
{
    public function up()
    {
        Schema::create('currency_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_account');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCurrencyUsersTable extends Migration
{
    public function up()
    {
        Schema::table('currency_users', function (Blueprint $table) {
            $table->unsignedInteger('id_partner_id');
            $table->foreign('id_partner_id', 'id_partner_fk_1952950')->references('id')->on('users');
            $table->unsignedInteger('nama_id');
            $table->foreign('nama_id', 'nama_fk_1952951')->references('id')->on('currencies');
            $table->unsignedInteger('nama_account_id')->nullable();
            $table->foreign('nama_account_id', 'nama_account_fk_1952953')->references('id')->on('users');
        });
    }
}

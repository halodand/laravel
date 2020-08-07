<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBankusersTable extends Migration
{
    public function up()
    {
        Schema::table('bankusers', function (Blueprint $table) {
            $table->unsignedInteger('nama_id');
            $table->foreign('nama_id', 'nama_fk_1952937')->references('id')->on('banks');
            $table->unsignedInteger('id_partner_id');
            $table->foreign('id_partner_id', 'id_partner_fk_1952957')->references('id')->on('users');
        });
    }
}

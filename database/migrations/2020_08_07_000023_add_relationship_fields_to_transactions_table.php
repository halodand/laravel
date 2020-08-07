<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedInteger('id_partner_id')->nullable();
            $table->foreign('id_partner_id', 'id_partner_fk_1928468')->references('id')->on('users');
            $table->unsignedInteger('jenis_currency_id')->nullable();
            $table->foreign('jenis_currency_id', 'jenis_currency_fk_1928469')->references('id')->on('currencies');
            $table->unsignedInteger('bank_id');
            $table->foreign('bank_id', 'bank_fk_1928470')->references('id')->on('users');
            $table->unsignedInteger('currency_member_id');
            $table->foreign('currency_member_id', 'currency_member_fk_1928471')->references('id')->on('users');
            $table->unsignedInteger('nilai_depo_id');
            $table->foreign('nilai_depo_id', 'nilai_depo_fk_1928472')->references('id')->on('currencies');
            $table->unsignedInteger('kurs_wd_id');
            $table->foreign('kurs_wd_id', 'kurs_wd_fk_1928473')->references('id')->on('currencies');
            $table->unsignedInteger('diskon_id')->nullable();
            $table->foreign('diskon_id', 'diskon_fk_1928474')->references('id')->on('currencies');
            $table->unsignedInteger('jumlahusd_id');
            $table->foreign('jumlahusd_id', 'jumlahusd_fk_1928475')->references('id')->on('currencies');
            $table->unsignedInteger('diproses_id');
            $table->foreign('diproses_id', 'diproses_fk_1928479')->references('id')->on('users');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1928483')->references('id')->on('teams');
        });
    }
}

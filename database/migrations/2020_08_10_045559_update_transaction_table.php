<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('nilai_depo_id')->nullable()->change();
            $table->integer('kurs_wd_id')->nullable()->change();
            $table->dropForeign('nilai_depo_fk_1928472');
            $table->dropForeign('kurs_wd_fk_1928473');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedInteger('nilai_depo_id');
            $table->foreign('nilai_depo_id', 'nilai_depo_fk_1928472')->references('id')->on('currencies');
            $table->unsignedInteger('kurs_wd_id');
            $table->foreign('kurs_wd_id', 'kurs_wd_fk_1928473')->references('id')->on('currencies');
        });
    }
}

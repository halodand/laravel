<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokersTable extends Migration
{
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul_kat');
            $table->string('judul_perusahaan');
            $table->string('kantor_pusat')->nullable();
            $table->string('tahun_berdiri')->nullable();
            $table->string('badan_regulasi')->nullable();
            $table->string('website')->nullable();
            $table->longText('profil')->nullable();
            $table->longText('jenis_akun')->nullable();
            $table->longText('deskripsi_tambahan')->nullable();
            $table->longText('kondisi_trading')->nullable();
            $table->longText('ket_broker')->nullable();
            $table->string('rebate_auto_manual')->nullable();
            $table->string('link_broker')->nullable();
            $table->decimal('kurs_depo', 15, 2)->nullable();
            $table->decimal('kurs_wd', 15, 2)->nullable();
            $table->string('stok');
            $table->string('no_broker');
            $table->string('nama_broker')->nullable();
            $table->string('status_transaksi');
            $table->integer('min_transaksi');
            $table->string('max_transaksi');
            $table->string('komisi_ib')->nullable();
            $table->string('komisi_pemilik')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

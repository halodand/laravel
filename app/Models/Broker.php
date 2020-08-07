<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Broker extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'brokers';

    protected $appends = [
        'img_broker',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const REBATE_AUTO_MANUAL_SELECT = [
        'Auto'   => 'Rebate Auto',
        'Manual' => 'Rebate Manual',
    ];

    const STATUS_TRANSAKSI_RADIO = [
        'Aktif'   => 'Depo Aktif',
        'Noaktif' => 'Depo Tidak aktif',
    ];

    protected $fillable = [
        'judul_kat',
        'judul_perusahaan',
        'kantor_pusat',
        'tahun_berdiri',
        'badan_regulasi',
        'website',
        'profil',
        'jenis_akun',
        'deskripsi_tambahan',
        'kondisi_trading',
        'ket_broker',
        'rebate_auto_manual',
        'link_broker',
        'kurs_depo',
        'kurs_wd',
        'stok',
        'no_broker',
        'nama_broker',
        'status_transaksi',
        'min_transaksi',
        'max_transaksi',
        'komisi_ib',
        'komisi_pemilik',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImgBrokerAttribute()
    {
        $file = $this->getMedia('img_broker')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}

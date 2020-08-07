<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Currency extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'currencies';

    protected $appends = [
        'img_page',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_RADIO = [
        'aktif'   => 'Aktif',
        'noaktif' => 'Tidak aktif',
    ];

    const JENIS_RADIO = [
        'E-payment'    => 'E-PAYMENT',
        'Broker Forex' => 'BROKER FOREX',
    ];

    protected $fillable = [
        'jenis',
        'nama',
        'jual',
        'beli',
        'diskon',
        'no_currency',
        'nama_currency',
        'min_trans',
        'max_trans',
        'status',
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

    public function diskonTransactions()
    {
        return $this->hasMany(Transaction::class, 'diskon_id', 'id');
    }

    public function getImgPageAttribute()
    {
        $file = $this->getMedia('img_page')->last();

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

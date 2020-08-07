<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Bank extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'banks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'nomor_rekening',
        'atasnama',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    const STATUS_RADIO = [
        'Aktif'      => 'Aktif-Rekening digunakan untuk invoice bank bersangkutan',
        'Tidakaktif' => 'Tidak aktif - Rekening tidak di gunakan untuk invoice bank bersangkutan',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}

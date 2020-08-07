<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Bankuser extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'bankusers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_partner_id',
        'nama_id',
        'nomor_rekening',
        'atas_nama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function id_partner()
    {
        return $this->belongsTo(User::class, 'id_partner_id');
    }

    public function nama()
    {
        return $this->belongsTo(Bank::class, 'nama_id');
    }
}

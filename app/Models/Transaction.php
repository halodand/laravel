<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Transaction extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        '1' => 'Pending',
        '2' => 'Sukses',
        '3' => 'Gagal',
    ];

    protected $fillable = [
        'no_order',
        'id_partner_id',
        'jenis_currency_id',
        'bank_id',
        'currency_member_id',
        'nilai_depo_id',
        'kurs_wd_id',
        'diskon_id',
        'jumlahusd_id',
        'total',
        'ket',
        'status',
        'diproses_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function id_partner()
    {
        return $this->belongsTo(User::class, 'id_partner_id');
    }

    public function jenis_currency()
    {
        return $this->belongsTo(Currency::class, 'jenis_currency_id');
    }

    public function bank()
    {
        return $this->belongsTo(User::class, 'bank_id');
    }

    public function currency_member()
    {
        return $this->belongsTo(User::class, 'currency_member_id');
    }

    public function nilai_depo()
    {
        return $this->belongsTo(Currency::class, 'nilai_depo_id');
    }

    public function kurs_wd()
    {
        return $this->belongsTo(Currency::class, 'kurs_wd_id');
    }

    public function diskon()
    {
        return $this->belongsTo(Currency::class, 'diskon_id');
    }

    public function jumlahusd()
    {
        return $this->belongsTo(Currency::class, 'jumlahusd_id');
    }

    public function diproses()
    {
        return $this->belongsTo(User::class, 'diproses_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}

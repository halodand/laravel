<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CurrencyUser extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'currency_users';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_partner_id',
        'nama_id',
        'no_account',
        'nama_account_id',
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
        return $this->belongsTo(Currency::class, 'nama_id');
    }

    public function nama_account()
    {
        return $this->belongsTo(User::class, 'nama_account_id');
    }
}

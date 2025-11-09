<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'tipe',
        'nominal',
        'keterangan',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}

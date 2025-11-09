<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'saldo',
    ];

    // public function transactions()
    // {
    //     return $this->hasMany(Transaksi::class, 'member_id');
    // }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'member_id');
    }
}

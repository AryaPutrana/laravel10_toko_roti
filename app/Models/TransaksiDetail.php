<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = ['transaksi_id', 'roti_id', 'jumlah', 'sub_total'];

    public function roti()
    {
        return $this->belongsTo(Roti::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}

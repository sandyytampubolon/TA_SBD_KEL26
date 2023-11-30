<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Tbs extends Model
{
    use HasFactory;
    protected $table = 'pelanggans'; // Replace 'nama_tabel' with the actual table name

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'alamat',
        'loyalty_rank',
    ];
}

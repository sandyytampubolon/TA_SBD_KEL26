<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggans extends Model
{
    use HasFactory;
    protected $table = 'transaksi_tbs'; // Replace 'nama_tabel' with the actual table name

    protected $primaryKey = 'id_transactions';

    protected $fillable = [
        'fk_id_pelanggan',
        'fk_id_item',
        'transaction_date',
        'item_amount',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggans extends Model
{
    use HasFactory;
    protected $table = 'transaksis'; // Replace 'nama_tabel' with the actual table name

    protected $primaryKey = 'id_transactions';

    protected $fillable = [
        'id_transaction',
        'fk_id_customer',
        'fk_id_vinyl',
        'transaction_date',
        'item_amount',
    ];

}

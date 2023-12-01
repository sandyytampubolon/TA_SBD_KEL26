<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Tbs extends Model
{
    use HasFactory;
    protected $table = 'customers'; // Replace 'nama_tabel' with the actual table name

    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'id_customer',
        'nama',
        'alamat',
        'age',
    ];
}

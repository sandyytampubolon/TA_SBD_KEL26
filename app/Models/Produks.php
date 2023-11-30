<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'produks'; // Replace 'nama_tabel' with the actual table name

    protected $primaryKey = 'id_item';

    protected $fillable = [
        'id_item',
        'nama_barang',
        'harga_barang',
        'fk_id_merk'
    ];
}

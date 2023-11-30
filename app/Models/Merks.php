<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merks extends Model
{
    use HasFactory;

    protected $table = 'merks'; // Replace 'nama_tabel' with the actual table name

    protected $primaryKey = 'id_merk';

    protected $fillable = [
        'id_merk',
        'nama_merk',
        'country'
    ];

}

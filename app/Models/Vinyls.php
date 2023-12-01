<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'vinyls'; // Replace 'nama_tabel' with the actual table name

    protected $primaryKey = 'id_vinyl';

    protected $fillable = [
        'id_vinyl',
        'nama_vinyl',
        'price'
    ];
}

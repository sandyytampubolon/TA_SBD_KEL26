<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merks extends Model
{
    use HasFactory;
    use SoftDelete;

    protected $table = 'categories'; // Replace 'nama_tabel' with the actual table name

    protected $primaryKey = 'id_category';

    protected $fillable = [
        'id_category',
        'nama_category',
        'pop_rate'
    ];

}

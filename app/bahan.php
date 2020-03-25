<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    protected $table = 'bahan';

    protected $fillable = [
        'nama_bahan', 'banyak_bahan', 'satuan', 'id_user'
    ];
}

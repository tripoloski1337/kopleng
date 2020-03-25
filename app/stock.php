<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $table = 'stock';

    protected $fillable = [
        'id_bahan', 'banyak_bahan', 'id_user'
    ];
}

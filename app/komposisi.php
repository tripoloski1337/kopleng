<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komposisi extends Model
{
    //
    protected $table = 'komposisi';

    protected $fillable = [
        'id_item', 'id_bahan','banyak_penggunaan'
    ];
}

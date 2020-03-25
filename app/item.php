<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    //
    protected $table = 'item';

    protected $fillable = [
        'nama_item', 'harga_item'
    ];
}

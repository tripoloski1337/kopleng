<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chart extends Model
{
    //
    protected $table = 'chart';

    protected $fillable = [
        'id_item', 'id_user', 'banyak_beli', 'status'
    ];
}

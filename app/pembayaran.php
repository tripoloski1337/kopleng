<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    //
    protected $table = 'pembayaran';

    protected $fillable = [
        'id_user', 'total_pembayaran','uang_bayar' , 'date_pembayaran'
    ];
}

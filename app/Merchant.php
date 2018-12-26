<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchants';

    protected $fillable = [
        'nama',
        'tlp',
        'alamat',
        'deskripsi'
    ];
}
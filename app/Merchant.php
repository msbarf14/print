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
        'deskripsi',
        'user_id'
    ];

    protected $appends = [
        'user_label'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getUserLabelAttribute() {
        return object_get($this->user, 'name', '-');
    }
}

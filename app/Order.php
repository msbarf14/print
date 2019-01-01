<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'name',
        'doc',
        'user_id',
        'marchant_id'
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

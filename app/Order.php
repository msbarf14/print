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
        'marchant_id',
        'qty',
        'description'
    ];
    
    protected $appends = [
        'user_label', 
        'marchant_label'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function marchant() {
        return $this->belongsTo('App\Merchant');
    }

    public function getUserLabelAttribute() {
        return object_get($this->user, 'name', '-');
    }

    public function getMarchantLabelAttribute() {
        return object_get($this->marchant, 'nama', '-');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teashop extends Model
{
    use HasFactory;
    
    public function teas() {
        return $this->belongsToMany(Tea::class, 'shop_teas');
    }
}

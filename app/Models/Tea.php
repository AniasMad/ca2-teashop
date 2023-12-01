<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tea extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function teashops() 
    {
        return $this->belongsToMany(Teashop::class, 'shop_teas');
    }
    public function favorites() {
        return $this->belongsToMany(User::class, 'favourites');
    }
}

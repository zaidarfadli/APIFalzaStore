<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'detail',
        'image',
    ];


    public function itemTypes()
    {
        return $this->hasMany(ItemType::class);
    }

    public function gameItems()
    {
        return $this->hasMany(GameItem::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'item_type_id',
        'name',
        'amount_item',
        'bonus',
        'price',
        'image'

    ];

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function game()
    {

        return $this->belongsTo(Game::class);
    }
}

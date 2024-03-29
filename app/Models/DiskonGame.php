<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiskonGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'percent',
        'game_item_id',
        'status'
    ];
}

<?php

namespace Database\Seeders;

use App\Models\GameItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $gamesItems = [
            [
                'game_id' => '2',
                'item_type_id' => '2',
                'name' => '22 Diamonds',
                'amount_item' => 22,
                'bonus' => 3,
                'image' => 'diamond.jpg',
                'price' => 20000

            ],
        ];

        foreach ($gamesItems as $gamesItem) {
            GameItem::create($gamesItem);
        }
    }
}

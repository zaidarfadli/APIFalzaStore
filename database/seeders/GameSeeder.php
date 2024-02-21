<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'name' => 'Clash of Clans',
                'slug' => 'clash-of-clans',
                'detail' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, atque laboriosam omnis ut expedita possimus architecto! Possimus, non quam! Minus!',
                'image' => 'clash-of-clans.jpg'
            ],

            [
                'name' => 'Mobile Legends',
                'slug' => 'mobile-legends',
                'detail' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, atque laboriosam omnis ut expedita possimus architecto! Possimus, non quam! Minus!',
                'image' => 'mobile-legends.jpg'
            ],
            [
                'name' => 'EA Sport FC Mobile',
                'slug' => 'ea-sports-fc-mobile',
                'detail' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, atque laboriosam omnis ut expedita possimus architecto! Possimus, non quam! Minus!',
                'image' => 'ea-sports-fc-mobile.jpg'

            ],

        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}

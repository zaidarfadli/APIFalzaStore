<?php

namespace Database\Seeders;

use App\Models\ItemType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemTypes = [
            [
                'name_item_type' => 'Gems',
                'game_id' => 1,
            ], [
                'name_item_type' => 'Diamonds',
                'game_id' => 1,
            ],
            [
                'name_item_type' => 'Twilight Pass',
                'game_id' => 2,
            ],
            [
                'name_item_type' => 'Silver',
                'game_id' => 3,
            ],
            [
                'name_item_type' => 'FC Points',
                'game_id' => 3,
            ],
        ];

        foreach ($itemTypes as $itemType) {
            ItemType::create($itemType);
        }
    }
}

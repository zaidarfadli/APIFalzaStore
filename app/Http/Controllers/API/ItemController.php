<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreItemGameRequest;
use App\Models\Game;
use App\Models\GameItem;
use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function readGameItem(Game $game)
    {
        $gameItem = $game->gameItems()->get();

        return response()->json([
            'game_item' => $gameItem,
            'game' => $game
        ]);
    }


    public function addGameItem(StoreItemGameRequest $request)
    {

        $validatedData = $request->validated();


        $gameItem = new GameItem();

        $gameItem->name = $validatedData['name'];
        $gameItem->amount_item = $validatedData['amount_item'];
        $gameItem->price = $validatedData['price'];
        $gameItem->game_id = $validatedData['game_id'];
        $gameItem->item_type_id = $validatedData['item_type_id'];
        $gameItem->image = $validatedData['image'];
        $gameItem->bonus = $validatedData['bonus'];


        $gameItem->save();


        return response()->json([
            'status' => 'success',
            'message' => 'Item game berhasil ditambahkan',
            'data' => $gameItem
        ]);
    }

    public function readGameItemByItemType(Game $game, ItemType $itemType)
    {

        $gameItem = $game->gameItems()->where('item_type_id', $itemType->id)->get();

        return response()->json([
            'game_item' => $gameItem
        ]);
    }
}

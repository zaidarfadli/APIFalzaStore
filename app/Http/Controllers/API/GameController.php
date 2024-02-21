<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function readGame()
    {
        $games = Game::with('itemTypes')->latest()->get();

        return response()->json([
            'games' => $games
        ]);
    }

    public function storeGame(StoreGameRequest $request)
    {
        $validatedData = $request->validate();

        $validatedData['slug'] = $validatedData['name'] . time();

        $game = Game::create($validatedData);

        return response()->json([
            'game' => $game,
            'status' => 'success',
            'message' => 'Berhasil Membuat Game'
        ]);
    }
}

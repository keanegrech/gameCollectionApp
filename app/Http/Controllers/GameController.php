<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Machine;
use App\Models\Screenshot;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    function index() {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    function show($id) {
        $game = Game::find($id);

        $response = Http::get('http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=' . $game->steam_app_id . '&count=3&maxlength=300&format=json');
        $newsItems = $response->json()['appnews']['newsitems'] ?? [];

        $screenshots = Screenshot::where('game_id', $game->id)->get();

        return view('games.show', compact('game', 'newsItems', 'screenshots'));
    }

    function create() {
        $game = new Game();
        $machines = Machine::orderBy('name')->pluck('name', 'id');
        return view('games.create', compact('game', 'machines'));
    }

    function edit($id) {
        $game = Game::find($id);
        $machines = Machine::orderBy('name')->pluck('name', 'id');
        return view('games.edit', compact('game', 'machines'));
    }

    function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'steam_app_id' => 'required|integer',
            'developer' => 'required',
            'percent_complete' => 'required|integer|min:0|max:100',
            'release_date' => 'required|date',
            'machine_id' => 'required|exists:machines,id',
        ]);

        Game::create($request->all());
        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }

    function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'steam_app_id' => 'required|integer',
            'developer' => 'required',
            'percent_complete' => 'required|integer|min:0|max:100',
            'release_date' => 'required|date',
            'machine_id' => 'required|exists:machines,id',
        ]);

        $game = Game::find($id);
        $game->update($request->all());
        return redirect()->route('games.show', $game->id)->with('success', 'Game updated successfully.');
    }

    function destroy($id) {
        $game = Game::find($id);
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Machine;

class GameController extends Controller
{
    function index() {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    function show($id) {
        $game = Game::find($id);
        return view('games.show', compact('game'));
    }

    function create() {
        $game = new Game();
        $machines = Machine::orderBy('name')->pluck('name', 'id');
        return view('games.create', compact('game', 'machines'));
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
}

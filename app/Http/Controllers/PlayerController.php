<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();

        return view('players.index', compact('players'));
    }

    public function create()
    { $teams = Team::all();
        return view('players.create',compact("teams"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'age' => 'nullable|integer',
            'height' => 'nullable|numeric',
            'team_id' => 'required|integer',
        ]);

        Player::create($validatedData);

        return redirect()->route('players.index')->with('success', 'Player created successfully.');
    }

    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'age' => 'nullable|integer',
            'height' => 'nullable|numeric',
            'team_id' => 'required|integer',
        ]);

        $player->update($validatedData);

        return redirect()->route('players.index')->with('success', 'Player updated successfully.');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player deleted successfully.');
    }
}

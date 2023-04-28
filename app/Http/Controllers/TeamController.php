<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Sport;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('teams.index', ['teams' => $teams]);
    }

    public function create()
    
    {
        $sports = Sport::all();
        return view('teams.create',compact("sports"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'city' => 'max:50',
            'sport_id' => 'required|exists:sports,id',
        ]);

        Team::create($validatedData);

        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    public function show(Team $team)
    {
        return view('teams.show', ['team' => $team]);
    }

    public function edit(Team $team)
    {
        return view('teams.edit', ['team' => $team]);
    }

    public function update(Request $request, Team $team)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'city' => 'max:50',
            'sport_id' => 'required|exists:sports,id',
        ]);

        $team->update($validatedData);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }
}

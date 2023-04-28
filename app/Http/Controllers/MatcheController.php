<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Matche;
use App\Models\Team;
use Illuminate\Http\Request;

class MatcheController extends Controller
{

    public function index()
    {
        $matches = Matche::all();
        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $sports = Sport::all();
        $teams = Team::all();
        return view('matches.create',compact("sports","teams"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'location' => 'required|string|max:50',
            'home_team_id' => 'required|exists:App\Models\Team,id',
            'away_team_id' => 'required|exists:App\Models\Team,id',
        ]);

        Matche::create($request->all());

        return redirect()->route('matches.index')
            ->with('success', 'Matche created successfully.');
    }

    public function show(Matche $matche)
    {
        return view('matches.show', compact('matche'));
    }

    public function edit(Matche $matche)
    {
        return view('matches.edit', compact('matche'));
    }

    public function update(Request $request, Matche $matche)
    {
        $request->validate([
            'date' => 'required|date',
            'location' => 'required|string|max:50',
            'home_team_id' => 'required|exists:App\Models\Team,id',
            'away_team_id' => 'required|exists:App\Models\Team,id',
        ]);

        $matche->update($request->all());

        return redirect()->route('matches.index')
            ->with('success', 'Matche updated successfully.');
    }

    public function destroy(Matche $matche)
    {
        $matche->delete();

        return redirect()->route('matches.index')
            ->with('success', 'Matche deleted successfully.');
    }
}


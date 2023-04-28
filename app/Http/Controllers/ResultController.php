<?php

namespace App\Http\Controllers;

use App\Models\Matche;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::all();
        return view('results.index', compact('results'));
    }

    public function create()
    {
        $matches = Matche::all();
        return view('results.create',compact("matches"));
    }

    public function store(Request $request)
    {
        $result = new Result;
        $result->match_id = $request->match_id;
        $result->home_team_score = $request->home_team_score;
        $result->away_team_score = $request->away_team_score;
        $result->save();

        return redirect()->route('results.index')->with('success', 'Résultat enregistré avec succès.');
    }

    public function show($id)
    {
        $result = Result::findOrFail($id);
        return view('results.show', compact('result'));
    }

    public function edit($id)
    {
        $result = Result::findOrFail($id);
        return view('results.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        $result = Result::findOrFail($id);
        $result->match_id = $request->match_id;
        $result->home_team_score = $request->home_team_score;
        $result->away_team_score = $request->away_team_score;
        $result->save();

        return redirect()->route('results.index')->with('success', 'Résultat mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();

        return redirect()->route('results.index')->with('success', 'Résultat supprimé avec succès.');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\Team;

class RankingController extends Controller
{

    public function index()
    {
        $rankings = Ranking::all();

        return view('rankings.index', compact('rankings'));
    }

    public function create()
    {
        $equipes = Team::all();
        return view('rankings.create',compact('equipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required|integer',
            'points' => 'required|integer',
            'wins' => 'required|integer',
            'losses' => 'required|integer',
        ]);

        Ranking::create($request->all());
        return redirect()->route('rankings.index')
            ->with('success', 'Ranking created successfully.');
    }

    public function show($id)
    {
        $ranking = Ranking::findOrFail($id);

        return view('rankings.show', compact('ranking'));
    }

    public function edit($id)
    {
        $ranking = Ranking::findOrFail($id);

        return view('rankings.edit', compact('ranking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'team_id' => 'required|integer',
            'points' => 'required|integer',
            'wins' => 'required|integer',
            'losses' => 'required|integer',
        ]);

        $ranking = Ranking::findOrFail($id);
        $ranking->update($request->all());

        return redirect()->route('rankings.index')
            ->with('success', 'Ranking updated successfully');
    }

    public function destroy($id)
    {
        $ranking = Ranking::findOrFail($id);
        $ranking->delete();

        return redirect()->route('rankings.index')
            ->with('success', 'Ranking deleted successfully');
    }
}

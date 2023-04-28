<?php
namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        return view('sports.index', compact('sports'));
    }

    public function create()
    {
        return view('sports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'nullable|max:255',
        ]);

        $sport = Sport::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('sports.index')->with('success', 'Sport créé avec succès.');
    }

    public function show(Sport $sport)
    {
        return view('sports.show', compact('sport'));
    }

    public function edit(Sport $sport)
    {
        return view('sports.edit', compact('sport'));
    }

    public function update(Request $request, Sport $sport)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'nullable|max:255',
        ]);

        $sport->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('sports.index')->with('success', 'Sport mis à jour avec succès.');
    }

    public function destroy(Sport $sport)
    {
        $sport->delete();
        return redirect()->route('sports.index')->with('success', 'Sport supprimé avec succès.');
    }
}

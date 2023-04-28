@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un nouveau classement</h1>
    <form action="{{ route('rankings.store') }}" method="POST">
        @csrf'
        <div class="mb-3">
            <label for="equipe" class="form-label">Equipe</label>
            <select class="form-select" id="equipe" name="equipe_id">
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="joue" class="form-label">Joué</label>
            <input type="number" class="form-control" id="joue" name="joue" min="0" value="0">
        </div>
        <div class="mb-3">
            <label for="gagne" class="form-label">Gagné</label>
            <input type="number" class="form-control" id="gagne" name="gagne" min="0" value="0">
        </div>
        <div class="mb-3">
            <label for="nul" class="form-label">Nul</label>
            <input type="number" class="form-control" id="nul" name="nul" min="0" value="0">
        </div>
        <div class="mb-3">
            <label for="perdu" class="form-label">Perdu</label>
            <input type="number" class="form-control" id="perdu" name="perdu" min="0" value="0">
        </div>
        <div class="mb-3">
            <label for="bp" class="form-label">Buts Pour</label>
            <input type="number" class="form-control" id="bp" name="bp" min="0" value="0">
        </div>
        <div class="mb-3">
            <label for="bc" class="form-label">Buts Contre</label>
            <input type="number" class="form-control" id="bc" name="bc" min="0" value="0">
        </div>
        <div class="mb-3">
            <label for="difference" class="form-label">Différence de Buts</label>
            <input type="number" class="form-control" id="difference" name="difference" min="0" value="0">
        </div>
        <div class="mb-3">
            <label for="points" class="form-label">Points</label>
            <input type="number" class="form-control" id="points" name="points" min="0" value="0">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection

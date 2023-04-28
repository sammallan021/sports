@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier les informations d'un joueur</h1>
    <hr>

    <form method="POST" action="{{ route('players.update', $player->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $player->name }}" required>
        </div>

        <div class="mb-3">
            <label for="team_id" class="form-label">Equipe</label>
            <select class="form-select" id="team_id" name="team_id" required>
                <option value="">Sélectionnez une équipe</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $player->team_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="birthdate" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $player->birthdate }}" required>
        </div>

        <div class="mb-3">
            <label for="height" class="form-label">Taille</label>
            <input type="number" class="form-control" id="height" name="height" value="{{ $player->height }}" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $player->position }}" required>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('players.index') }}" class="btn btn-secondary me-2">Annuler</a>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@endsection

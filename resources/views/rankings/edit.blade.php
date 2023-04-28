@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier un classement</h1>
    <form method="POST" action="{{ route('classements.update', $classement->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="equipe_id" class="form-label">Equipe</label>
            <select class="form-select" name="equipe_id" id="equipe_id">
                @foreach ($equipes as $equipe)
                    <option value="{{ $equipe->id }}" @if ($equipe->id == $classement->equipe_id) selected @endif>{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="points" class="form-label">Points</label>
            <input type="number" class="form-control" id="points" name="points" value="{{ $classement->points }}" required>
        </div>

        <div class="mb-3">
            <label for="joue" class="form-label">Matches joués</label>
            <input type="number" class="form-control" id="joue" name="joue" value="{{ $classement->joue }}" required>
        </div>

        <div class="mb-3">
            <label for="gagne" class="form-label">Matches gagnés</label>
            <input type="number" class="form-control" id="gagne" name="gagne" value="{{ $classement->gagne }}" required>
        </div>

        <div class="mb-3">
            <label for="nul" class="form-label">Matches nuls</label>
            <input type="number" class="form-control" id="nul" name="nul" value="{{ $classement->nul }}" required>
        </div>

        <div class="mb-3">
            <label for="perdu" class="form-label">Matches perdus</label>
            <input type="number" class="form-control" id="perdu" name="perdu" value="{{ $classement->perdu }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('classements.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

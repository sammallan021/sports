@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le matche</h1>
        <form action="{{ route('matches.update', $matche->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $matche->date }}">
            </div>
            <div class="form-group">
                <label for="time">Heure :</label>
                <input type="time" name="time" id="time" class="form-control" value="{{ $matche->time }}">
            </div>
            <div class="form-group">
                <label for="team1_id">Equipe 1 :</label>
                <select name="team1_id" id="team1_id" class="form-control">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ $team->id == $matche->team1_id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="team2_id">Equipe 2 :</label>
                <select name="team2_id" id="team2_id" class="form-control">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ $team->id == $matche->team2_id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="score1">Score Equipe 1 :</label>
                <input type="number" name="score1" id="score1" class="form-control" value="{{ $matche->score1 }}">
            </div>
            <div class="form-group">
                <label for="score2">Score Equipe 2 :</label>
                <input type="number" name="score2" id="score2" class="form-control" value="{{ $matche->score2 }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('matches.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection

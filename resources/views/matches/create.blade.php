@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un nouveau matche</h1>
    <hr>
    <form action="{{ route('matches.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sport_id">Sport :</label>
            <select class="form-control" id="sport_id" name="sport_id">
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="team_home_id">Équipe à domicile :</label>
            <select class="form-control" id="team_home_id" name="team_home_id">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="team_away_id">Équipe à l'extérieur :</label>
            <select class="form-control" id="team_away_id" name="team_away_id">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="datetime-local" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="location">Lieu :</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>
        <div class="form-group">
            <label for="score_home">Score à domicile :</label>
            <input type="number" class="form-control" id="score_home" name="score_home">
        </div>
        <div class="form-group">
            <label for="score_away">Score à l'extérieur :</label>
            <input type="number" class="form-control" id="score_away" name="score_away">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des matches</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Équipe domicile</th>
                <th>Équipe visiteur</th>
                <th>Date</th>
                <th>Résultat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $matche)
            <tr>
                <td>{{ $matche->home_team->name }}</td>
                <td>{{ $matche->away_team->name }}</td>
                <td>{{ $matche->date->format('d/m/Y H:i') }}</td>
                <td>{{ $matche->result }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('matches.create') }}" class="btn btn-success">Ajouter un match</a>
</div>
@endsection

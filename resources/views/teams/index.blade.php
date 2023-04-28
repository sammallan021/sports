@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des équipes</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Ville</th>
                                <th>Nombre de joueurs</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->city }}</td>
                                <td>{{ $team->players->count() }}</td>
                                <td>
                                    <a href="{{ route('teams.show', $team->id) }}" class="btn btn-primary">Voir</a>
                                    <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('teams.create') }}" class="btn btn-success">Ajouter un équipe</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

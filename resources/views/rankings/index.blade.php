@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste des classements</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Equipe</th>
                            <th scope="col">Joués</th>
                            <th scope="col">Gagnés</th>
                            <th scope="col">Nuls</th>
                            <th scope="col">Perdus</th>
                            <th scope="col">Pour</th>
                            <th scope="col">Contre</th>
                            <th scope="col">Différence</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rankings as $ranking)
                            <tr>
                                <td>{{ $ranking->id }}</td>
                                <td>{{ $ranking->team->name }}</td>
                                <td>{{ $ranking->played }}</td>
                                <td>{{ $ranking->won }}</td>
                                <td>{{ $ranking->drawn }}</td>
                                <td>{{ $ranking->lost }}</td>
                                <td>{{ $ranking->goals_for }}</td>
                                <td>{{ $ranking->goals_against }}</td>
                                <td>{{ $ranking->goal_difference }}</td>
                                <td>{{ $ranking->points }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('rankings.create') }}" class="btn btn-success">Ajouter un classement</a>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Liste des joueurs</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Age</th>
          <th>Taille</th>
          <th>Équipe</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($players as $joueur)
          <tr>
            <td>{{ $joueur->id }}</td>
            <td>{{ $joueur->last_name }}</td>
            <td>{{ $joueur->first_name }}</td>
            <td>{{ $joueur->age }}</td>
            <td>{{ $joueur->height }}</td>
            <td>{{ $joueur->equipe->name }}</td>
            <td>
              <a href="{{ route('joueurs.show', $joueur->id) }}" class="btn btn-primary">Afficher</a>
              <a href="{{ route('joueurs.edit', $joueur->id) }}" class="btn btn-warning">Modifier</a>
              <form action="{{ route('joueurs.destroy', $joueur->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?')">Supprimer</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ route('players.create') }}" class="btn btn-success">Ajouter un joueur</a>
  </div>
@endsection

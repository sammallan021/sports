@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des sports</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sports as $sport)
                    <tr>
                        <td>{{ $sport->name }}</td>
                        <td>{{ $sport->description }}</td>
                        <td>
                            <a href="{{ route('sports.edit', ['sport' => $sport->id]) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <form action="{{ route('sports.destroy', ['sport' => $sport->id]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce sport ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('sports.create') }}" class="btn btn-primary">Ajouter un sport</a>
    </div>
@endsection

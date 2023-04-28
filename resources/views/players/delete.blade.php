@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Confirmation de suppression
            </div>
            <div class="card-body">
                <h5 class="card-title">Êtes-vous sûr de vouloir supprimer le joueur {{ $player->name }}?</h5>
                <form method="POST" action="{{ route('players.destroy', $player->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{ route('players.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection

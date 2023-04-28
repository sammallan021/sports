@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirmation de suppression') }}</div>

                <div class="card-body">
                    <p>Êtes-vous sûr de vouloir supprimer l'équipe {{ $team->name }}?</p>
                    <form action="{{ route('team.destroy', $team->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                        <a href="{{ route('team.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

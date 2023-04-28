@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirmation de suppression') }}</div>

                    <div class="card-body">
                        <p>Voulez-vous vraiment supprimer ce matche ?</p>
                        <p><strong>Equipe à domicile:</strong> {{ $matche->home_team }}</p>
                        <p><strong>Equipe visiteur:</strong> {{ $matche->away_team }}</p>
                        <p><strong>Date:</strong> {{ $match->date }}</p>

                        <form method="POST" action="{{ route('matches.destroy', $matche->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Supprimer') }}
                                    </button>
                                    <a href="{{ route('matches.index') }}" class="btn btn-secondary">
                                        {{ __('Annuler') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

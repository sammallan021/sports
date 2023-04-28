@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirmation de suppression') }}</div>

                <div class="card-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce résultat?</p>
                    <p><strong>{{ $result->matche->team_home }} {{ $result->score_home }} - {{ $result->score_away }} {{ $result->matche->team_away }}</strong></p>

                    <form action="{{ route('results.destroy', $result->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                            <a href="{{ route('results.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

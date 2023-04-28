@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier le résultat') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('results.update', $result->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="matche_id" class="col-md-4 col-form-label text-md-right">{{ __('Matche') }}</label>

                            <div class="col-md-6">
                                <select id="matche_id" class="form-control @error('matche_id') is-invalid @enderror" name="matche_id" required>
                                    @foreach($matches as $matche)
                                        <option value="{{ $matche->id }}" {{ $result->match_id == $matche->id ? 'selected' : '' }}>{{ $matche->team_home }} vs {{ $matche->team_away }}</option>
                                    @endforeach
                                </select>

                                @error('match_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="team_home_score" class="col-md-4 col-form-label text-md-right">{{ __('Score de l\'équipe à domicile') }}</label>

                            <div class="col-md-6">
                                <input id="team_home_score" type="number" class="form-control @error('team_home_score') is-invalid @enderror" name="team_home_score" value="{{ $result->team_home_score }}" required autofocus>

                                @error('team_home_score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="team_away_score" class="col-md-4 col-form-label text-md-right">{{ __('Score de l\'équipe à l\'extérieur') }}</label>

                            <div class="col-md-6">
                                <input id="team_away_score" type="number" class="form-control @error('team_away_score') is-invalid @enderror" name="team_away_score" value="{{ $result->team_away_score }}" required>

                                @error('team_away_score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                                <a href="{{ route('results.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

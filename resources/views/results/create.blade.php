@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajouter un nouveau résultat') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('results.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="matche_id" class="col-md-4 col-form-label text-md-right">{{ __('Matche') }}</label>

                            <div class="col-md-6">
                                <select id="matche_id" class="form-control @error('matche_id') is-invalid @enderror" name="matche_id" required>
                                    <option value="" selected disabled>{{ __('Sélectionner un matche') }}</option>
                                    @foreach ($matches as $matche)
                                        <option value="{{ $matche->id }}" {{ old('matche_id') == $matche->id ? 'selected' : '' }}>{{ $matche->team1->name }} vs {{ $matche->team2->name }}</option>
                                    @endforeach
                                </select>

                                @error('matche_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="team1_score" class="col-md-4 col-form-label text-md-right">{{ __('Score de l\'équipe 1') }}</label>

                            <div class="col-md-6">
                                <input id="team1_score" type="number" min="0" class="form-control @error('team1_score') is-invalid @enderror" name="team1_score" value="{{ old('team1_score') }}" required autofocus>

                                @error('team1_score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="team2_score" class="col-md-4 col-form-label text-md-right">{{ __('Score de l\'équipe 2') }}</label>

                            <div class="col-md-6">
                                <input id="team2_score" type="number" min="0" class="form-control @error('team2_score') is-invalid @enderror" name="team2_score" value="{{ old('team2_score') }}" required>

                                @error('team2_score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
                                </button>
                                <a href="{{ route('results.index') }}" class="btn btn-secondary">
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

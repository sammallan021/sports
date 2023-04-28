@extends('layouts.app')

@section('title', 'Ajouter une équipe')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter une équipe</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('teams.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom de l'équipe</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sport_id" class="col-md-4 col-form-label text-md-right">Sport</label>

                                <div class="col-md-6">
                                    <select id="sport_id" name="sport_id" class="form-control @error('sport_id') is-invalid @enderror" required>
                                        <option value="">-- Choisissez un sport --</option>
                                        @foreach($sports as $sport)
                                            <option value="{{ $sport->id }}" {{ old('sport_id') == $sport->id ? 'selected' : '' }}>{{ $sport->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('sport_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Annuler</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

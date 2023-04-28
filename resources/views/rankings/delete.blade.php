@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirmation de suppression') }}</div>

                    <div class="card-body">
                        <p>Êtes-vous sûr de vouloir supprimer ce classement ?</p>

                        <form action="{{ route('classements.destroy', $classement->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                                <a href="{{ route('classements.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

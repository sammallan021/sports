@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Confirmation de suppression') }}</div>

        <div class="card-body">
          <h5 class="card-title">Voulez-vous vraiment supprimer ce sport ?</h5>
          <p class="card-text">Nom du sport : {{ $sport->name }}</p>
          <form action="{{ route('sports.destroy', $sport->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('sports.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
            <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

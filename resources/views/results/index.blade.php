@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Liste des résultats') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Matche') }}</th>
                                    <th scope="col">{{ __('Équipe') }}</th>
                                    <th scope="col">{{ __('Score') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->id }}</td>
                                        <td>{{ $result->matche->name }}</td>
                                        <td>{{ $result->team->name }}</td>
                                        <td>{{ $result->score }}</td>
                                        <td>
                                            <a href="{{ route('results.edit', $result->id) }}" class="btn btn-primary">{{ __('Modifier') }}</a>
                                            <form action="{{ route('results.destroy', $result->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce résultat ?') }}')">{{ __('Supprimer') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('results.create') }}" class="btn btn-success">Ajouter un résultat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier une équipe</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('teams.update', ['team' => $team->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom de l'équipe</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $team->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sport_id') ? ' has-error' : '' }}">
                            <label for="sport_id" class="col-md-4 control-label">Sport</label>

                            <div class="col-md-6">
                                <select id="sport_id" class="form-control" name="sport_id" required>
                                    @foreach($team as $sport)
                                        <option value="{{ $sport->id }}" {{ ($team->sport_id == $sport->id) ? 'selected' : '' }}>{{ $sport->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('sport_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sport_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

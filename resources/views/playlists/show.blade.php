@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show PLaylist</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('playlists.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="pull-right">
            <a class="btn btn-success" href="{{ route('musicas.add',$playlist) }}"> Add New Music to this playlist</a>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $playlist->nome }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Likes:</strong>
            {{ $playlist->Likes }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Owner:</strong>
            {{ $playlist->user->name }}
        </div>
    </div>
</div>

<h1>Musicas da Playlist {{ $playlist->nome }}:</h1>

@endsection

@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Artist</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('artists.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $artist->nome }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Data de Nascimento:</strong>
            {{ $artist->Data_de_nascimento }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Likes:</strong>
            {{ $artist->Likes }}
        </div>
    </div>
</div>

<h1>Musicas do artista</h1>

@endsection

@extends('layouts.layout')
@section('content')
<?php   
if(isset($_GET['id'])){
$musica=$_GET['id'];
$playlist->musica()->attach($musica);   
}

if(isset($_GET['remid'])){
    $musica=$_GET['remid'];
    $playlist->musica()->detach($musica);   
    }
    
?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Playlist</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('yourmusic') }}"> Back</a>
        </div>
    </div>
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
<table class="table table-bordered">
    <tr>
        <th>Nome</th>
        <th>Likes</th>
        <th>Duração</th>
        <th>Artista</th>
        <th>Album</th>
        <th>Genero</th>
        <th width="280px">Action</th>
    </tr>
      @foreach ($playlist->musica as $musica)
      
    <tr>
        <td>{{ $musica->nome }}</td>
        <td>{{ $musica->Likes }}</td>
        <td>{{ $musica->duracao }}</td>
        <td>{{ $musica->artista->nome }}</td>
        <td>{{ $musica->album->nome }}</td>
        <td>{{ $musica->genero->nome }}</td>
    
        <td>
            <form method="GET">
                @csrf                
                <button type="submit" value="{{ $musica->id }}" class="btn btn-danger" name="remid">REMOVE</button>
            </form>    
        </td>
    </tr>
    @endforeach
</table>


<h1>Musicas para adicionar a Playlist {{ $playlist->nome }}:</h1>
<table class="table table-bordered">
    <tr>
        <th>Nome</th>
        <th>Likes</th>
        <th>Duração</th>
        <th>Artista</th>
        <th>Album</th>
        <th>Genero</th>
        <th width="280px">Action</th>
    </tr>    
    
    
    
    @foreach ($musicas as $musica)
    <tr>
        <td>{{ $musica->nome }}</td>
        <td>{{ $musica->Likes }}</td>
        <td>{{ $musica->duracao }}</td>
        <td>{{ $musica->artista->nome }}</td>
        <td>{{ $musica->album->nome }}</td>
        <td>{{ $musica->genero->nome }}</td>
        <td>
            <form method="GET">
                @csrf                
                <button type="submit" value="{{ $musica->id }}" class="btn btn-danger" name="id">ADD</button>
            </form>    
        </td>
    </tr>
    @endforeach
</table>
{{$musicas->appends(['musicas'=> $musicas->currentPage()])->links("pagination::bootstrap-4") }}  
   
   



@endsection

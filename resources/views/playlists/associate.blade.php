@extends('layouts.layout')
<?php   
if(isset($_POST['id'])){
$musica=$_POST['id'];
$playlist->musica()->attach($musica);   
}
?>

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Choose a Music to add</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('playlists.show',$playlist) }}"> Return to Your Playlist</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

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
            <form method="POST">
                @csrf                
                <button type="submit" value="{{ $musica->id }}" class="btn btn-danger" name="id">ADD</button>
            </form>    
        </td>
    </tr>
    @endforeach
</table>
   
   

@endsection
@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Musicas</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('musicas.create') }}"> Add New Musica</a>
            <a href="{{ route('adminpage') }}"><button class="myButton">Back to Admin Page</button></a>
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
        <th>No</th>
        <th>Nome</th>
        <th>Path</th>
        <th>Likes</th>
        <th>Duração</th>
        <th>Artista</th>
        <th>Album</th>
        <th>Genero</th>
        <th width="280px">Action</th>
    </tr>    
    
    
    
    @foreach ($musicas as $musica)
    <tr>
    <td>{{ $musica->id }}</td>
        <td>{{ $musica->nome }}</td>
        <td>{{ $musica->path }}</td>
        <td>{{ $musica->Likes }}</td>
        <td>{{ $musica->duracao }}</td>
        <td>{{ $musica->artista->nome }}</td>
        <td>{{ $musica->album->nome }}</td>
        <td>{{ $musica->genero->nome }}</td>
        <td>
            <form action="{{ route('musicas.destroy',$musica->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('musicas.show',$musica->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('musicas.edit',$musica->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{$musicas->appends(['musicas'=> $musicas->currentPage()])->links("pagination::bootstrap-4") }}    
   

@endsection

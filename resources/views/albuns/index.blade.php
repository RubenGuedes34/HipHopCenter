@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Albuns</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('albuns.create') }}"> Create New album</a>
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
        <th>Likes</th>
        <th>Artista</th>
        <th width="280px">Action</th>
    </tr>    
    
    
    
    @foreach ($albuns as $album)
    <tr>
    <td>{{ $album->id }}</td>
        <td>{{ $album->nome }}</td>
        <td>{{ $album->Likes }}</td>
        <td>{{ $album->artista->nome }}</td>
        <td>
            <form action="{{ route('albuns.destroy',$album->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('albuns.show',$album->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('albuns.edit',$album->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
   
   

@endsection

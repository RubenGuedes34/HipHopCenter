@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Playlists</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('playlists.create') }}"> Add New Playlist</a>
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
        <th>Owner</th>
        <th width="280px">Action</th>
    </tr>    
    
    
    
    @foreach ($playlists as $playlist)
    <tr>
    <td>{{ $playlist->id }}</td>
        <td>{{ $playlist->nome }}</td>
        <td>{{ $playlist->Likes }}</td>
        <td>{{ $playlist->user->name }}</td>
        <td>
            <form action="{{ route('playlists.destroy',$playlist->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('playlists.show',$playlist->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('playlists.edit',$playlist->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
   
   

@endsection
@section('js')



@endsection

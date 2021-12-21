@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Artists</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('artists.create') }}"> Create New artist</a>
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
        <th>Data de Nascimento</th>
        <th>Likes</th>
        <th width="280px">Action</th>
    </tr>    
    
    
    
    @foreach ($artists as $artist)
    <tr>
    <td>{{ $artist->id }}</td>
        <td>{{ $artist->nome }}</td>
        <td>{{ $artist->Data_de_nascimento }}</td>
        <td>{{ $artist->Likes }}</td>
        <td>
            <form action="{{ route('artists.destroy',$artist->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('artists.show',$artist->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('artists.edit',$artist->id) }}">Edit</a>

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

@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Generos</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('generos.create') }}"> Create New genero</a>
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
        <th>Id</th>
        <th>Name</th>
       
        <th width="280px">Action</th>
    </tr>
    @foreach ($generos as $genero)
    <tr>
        <td>{{ $genero->id }}</td>
        <td>{{ $genero->nome }}</td>
        <td>
            <form action="{{ route('generos.destroy',$genero->id) }}" method="POST">


                <a class="btn btn-primary" href="{{ route('generos.edit',$genero->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{$generos->appends(['generos'=> $generos->currentPage()])->links("pagination::bootstrap-4") }}
@endsection

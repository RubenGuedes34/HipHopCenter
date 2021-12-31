@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/adminpage.css')}}">

</head>
<body>

@section('content')



    <div id="mainContent">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Users Status</div>
                    <a href="{{ route('home') }}"><button class="myButton">Back to HomePage</button></a>
                    <div class="card-body">
                        <div class="container">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Last Song heard</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @if(Cache::has('user-is-online-' . $user->id))
                                                <span class="text-success">Online</span>
                                            @else
                                                <span class="text-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td>idk bro</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
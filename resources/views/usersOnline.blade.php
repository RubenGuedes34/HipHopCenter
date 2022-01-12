@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/adminpage.css')}}">
    <title>Hip-hop Center</title>

</head>
<body>

@section('content')



    <div id="mainContent">
    <a href="{{ route('home') }}"><button class="myButton">Back to HomePage</button></a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                    <h1 class=titulozin>All Users Status</h1>
                    
                    <div class="card-body">
                        <div class="container">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="headerStatus">
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Last Album heard</th>
                                    <th>Last Playlist heard</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td  class="statusAct">{{$user->name}}</td>
                                        <td>
                                            @if(Cache::has('user-is-online-' . $user->id))
                                                <span class="text-success">Online</span>
                                            @else
                                                <span class="text-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td class="statusAct"><?php
                                        if($user->lastAlbum==''){
                                            echo "No Albuns Heard";
                                        } else{
                                            echo $user->lastAlbum->nome;
                                        }
                                        
                                        ?></td>
                                         <td class="statusAct"><?php
                                        if($user->lastPlaylist==''){
                                            echo "No Playlists Heard";
                                        } else{
                                            echo $user->lastPlaylist->nome;
                                        }
                                        
                                        ?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                <div class="paginacaoFeira">
                                     {{$users->appends(['users'=> $users->currentPage()])->links("pagination::bootstrap-4") }}
                                </div>
                        </div>

                    </div>
                
            
        </div>
    </div>
@endsection
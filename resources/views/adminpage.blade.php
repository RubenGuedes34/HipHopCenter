<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/adminpage.css')}}">
    <title>Hip-hop center</title>
</head>
<body>
    
<div id="mainContent">
                
                <h1 class="admin">Admin Page</h1>

                <a href="{{ route('home') }}"><button class="myButton">Back to HomePage</button></a>

                <div class="header_fixed">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Users</td>
                                <td>Artists</td>
                                <td>Musics</td>
                                <td>Playlists</td>
                                <td>Albuns</td>
                                <td>Genres</td>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> <a href="{{ route('users.index') }}">Manage Users</a></td>
                            <td> <a href="{{ route('artists.index') }}">Manage Artists</a></td>
                            <td> <a href="{{ route('musicas.index') }}">Manage Musics</a></td>
                            <td> <a href="{{ route('playlists.index') }}">Manage Playlists</a></td>
                            <td> <a href="{{ route('albuns.index') }}">Manage Albuns</a></td>
                            <td> <a href="{{ route('generos.index') }}">Manage Genres</a></td>
                        </tr>
                       
                            
                        </tbody>
                    </table>
                </div>
  
            </div>


</body>
</html>
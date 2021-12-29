<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function adminpage(){
        return view("adminpage");
       }
}

?>
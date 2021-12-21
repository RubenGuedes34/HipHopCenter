<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HipHopCenterController extends Controller
{
   public function index(){
    return view("index");
   }

   public function autenticacao(){
    return view("auth/autenticacao");
   }

   public function homepage(){
    return view("homepage");
}
}

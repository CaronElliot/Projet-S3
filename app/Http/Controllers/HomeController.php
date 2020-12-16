<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $r){
        $jeux=Jeu::inRandomOrder()->limit(5)->get();
        return view('welcome',['data'=>$jeux]);
    }

    public function jeu(){
        $jeux=Jeu::all();
        return view('test',['jeux'=>$jeux]);
    }
}

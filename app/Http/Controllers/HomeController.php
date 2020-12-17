<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $r){
        $jeux=Jeu::inRandomOrder()->limit(5)->get();
        $mJeux=[];
        $meilleursJeux=Jeu::all();
        $f=[];

        if($r->triggermeilleurs=="oui"){
            $meilleursJeux=DB::select("SELECT jeu_id, avg(note) FROM commentaires GROUP BY jeu_id ORDER BY AVG(note) DESC LIMIT 5");
            for($i=0;$i<count($meilleursJeux);$i++){
                $f[]=Jeu::find(print_r($meilleursJeux[$i]->jeu_id,true));
            }
        }
        return view('welcome',['data'=>$jeux,'meilleursJeux'=>$f]);
    }

    public function jeu(){
        $jeux=Jeu::all();
        return view('test',['jeux'=>$jeux]);
    }
}

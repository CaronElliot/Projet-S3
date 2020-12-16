<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\Editeur;
use App\Models\Mecanique;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jeux = Jeu::all();
        if($request->tri == "oui") {
            $jeux = Jeu::orderBy('nom')->get();
        }
        return view("games.index", ['data' => $jeux]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $themes = Theme::all();
        $editeurs = Editeur::all();
        $mecaniques= Mecanique::all();

        return view('games.create',['themes'=>$themes,'editeurs'=>$editeurs,'mecaniques'=>$mecaniques]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'regles'=>'required',
            'langue'=>'required',
            'url_media',
            'age',
            'nombre_joueurs',
            'duree',
            'categorie',
            'editeur' => 'required',
            'theme' => 'required',
            'mecanique',
        ]);
        $jeu = new Jeu();
        $jeu->user_id=Auth::id();


        $jeu->nom = $request->nom;
        $jeu->description = $request->description;
        $jeu->regles = $request->regles;
        $jeu->langue = $request->langue;
        $jeu->url_media = $request->url_media;
        $jeu->age = $request->age;
        $jeu->nombre_joueurs = $request->nombre_joueurs;
        $jeu->duree=$request->duree;
        $jeu->categorie = $request->categorie;
        $jeu->editeur_id = $request->editeur;
        $jeu->theme_id=$request->theme;
        $mecaniques=Mecanique::all()->where('nom',$request->mecanique)->pluck('id');
        $jeu->mecaniques()->attach($mecaniques);

        $jeu->save();

        foreach($mecaniques as $meca){
            $meca->jeux()->attach($jeu->id);
        }

        return redirect()->route('jeu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jeu = Jeu::find($id);
        return view('games.show', ['data' => $jeu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function regles($id){
        $jeu = Jeu::find($id);
        return view('games.regles', ['jeu' => $jeu]);
    }
}

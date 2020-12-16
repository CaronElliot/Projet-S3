<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\Editeur;
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

        return view('games.create',['themes'=>$themes,'editeurs'=>$editeurs]);
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
            'editeur' => 'required',
            'theme' => 'required',
        ]);
        $jeu = new Jeu();
        $jeu->user_id=Auth::id();

        $editeur = DB::table('editeurs')->where('nom',$request->editeur)->pluck('id');
        $theme = DB::table('themes')->where('nom',$request->theme)->pluck('id');

        $jeu->nom = $request->nom;
        $jeu->description = $request->description;
        $jeu->editeur_id=$request->editeur;
        $jeu->theme_id=$request->theme;

        $jeu->save();

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

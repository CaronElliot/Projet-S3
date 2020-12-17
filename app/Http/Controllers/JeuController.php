<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeu;
use App\Models\Editeur;
use App\Models\Mecanique;
use App\Models\Theme;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        $editeurs=Editeur::all();
        $themes=Theme::all();
        $mecaniques=Mecanique::all();
        if($request->tri == "oui") {
            $jeux = Jeu::orderBy('nom')->get();
        }
        if(isset($request->editeur)){
            $jeux=Jeu::all()->where('editeur_id',$request->editeur);
        }
        if(isset($request->theme)){
            $jeux=Jeu::all()->where('theme_id',$request->theme);
        }
        if(isset($request->mecanique)){
            $mecanique_id=$request->mecanique;
            $jeux=Jeu::whereHas('mecaniques',function ($q) use($mecanique_id){
                $q->where('id',$mecanique_id);
            })->get();

        }
        return view("games.index", ['data' => $jeux,'editeurs' =>$editeurs,'themes' =>$themes,'mecaniques'=>$mecaniques]);
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
        $jeu->save();

        $mecaniques=Mecanique::findMany($request->mecanique)->pluck('id');
        $jeu->mecaniques()->attach($mecaniques);
        $jeu->save();


        return redirect()->route('jeu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $r)
    {
        $jeu = Jeu::find($id);
        $commentaires = Commentaire::all()->where('jeu_id',$id);
        if($r->tri == "oui") {
            $commentaires = Commentaire::orderBy('date_com','desc')->where('jeu_id',$id)->get();
    }

        return view('games.show', ['data' => $jeu,'commentaires'=>$commentaires]);
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

    public function commentaire(Request $r){

        $comm=new Commentaire();
        $comm->commentaire = $r->commentaire;
        $comm->user_id = Auth::id();
        $comm->date_com=Carbon::now();
        $comm->note=$r->Note;
        $comm->jeu_id=$r->idJeu;
        $comm->save();

        return redirect()->route('jeu.show',['jeu'=>$r->idJeu]);
    }

    public function profil(){
        if(Auth::check()) {
            $user_id = Auth::id();
            $user = User::find($user_id);
            $jeux = Jeu::all();
            $jeuxUser = Jeu::whereHas('acheteurs', function ($q) use ($user_id) {
                $q->where('user_id', $user_id);
            })->get();

            return view('games.profil', ['user' => $user, 'jeux' => $jeux, 'jeuxUser' => $jeuxUser]);
        }
        return redirect()->route('jeu.index');
    }

    public function ajouterAchat(Request $r){
        $jeu=Jeu::find($r->jeu);

        $jeu->acheteurs()->attach(Auth::id(), [
            'lieu' => $r->lieu,
            'prix' => $r->prix,
            'date_achat' => $r->date_achat]);

        $jeu->save();

        return redirect()->route('profil');
    }

    public function supprimerAchat(Request $r){
        $user_id=Auth::id();
        DB::table('achats')->where('jeu_id','=', $r->jeu)->where('user_id','=', $user_id)->delete();

        return redirect()->route('profil');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


use Illuminate\Support\Facades\Validator;
class MonControleur extends Controller
{
    function doLogin(LoginRequest $request){
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('index')); 

        }
        return back()->withInput()->withErrors([
            'email' => 'Vos identifiants sont incorrects.',
        ]);
    }
    function index(){
        $albums = Album::all();
        $user = auth();
        return view('index',['albums' => $albums , 'user' => $user]);
    }
    function login(){
        return view('login');
    }

    function inscription(){
        return view('inscription');
    }

    function register(Request $request){
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        // Si validation réussie, créer l'utilisateur
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    function dashboard(){
        $personne = auth()->user();

        return view('dashboard',['personne' => $personne]);
    }
    function creationT(Request $request){
        $album = new Album();
        $album->titre = $request->input('titre');
        $album->creation = date("Y-m-d");
        $album->user_id = auth()->id() ;
        $album->save();

        return redirect()->back()->with('succes','Ton album a bien été crée !');

    }

    function creation (){
        $personne = auth()->user();
        $tags = Tag::all();
        return view('creation' , ['personne' => $personne,'tags' => $tags]);
    }

    function ajout(Request $request){
        $hasname = $request->file('url')->hashName();
        $request->file('url')->storeAs("public/images",$hasname);
        $request->validate([
            'titre' => "required|min:3",    
            'url' => "required|mimes:jpg,bmp,png",
        ]);
        $photo = new Photo();
        $photo->titre = $request->input('titre');
        $photo->note = $request->input('note');
        $photo->url = "/storage/images/$hasname";
        $photo->album_id = $request->input('id_album');
        $photo->save();

        foreach($request->input('id_tag') as $tag_id){
            $photo -> tags()->attach($tag_id);
         }
         return redirect()->back()->with('succes','Ta photo a bien été ajouté a ton album !');



    }

    function photos(Request $request){
        $photos = Photo::all();
        
        if($request->input('ordre')==null)
            $photos = Photo::all();
        elseif($request->input('ordre')=='note'){
            $photos = $photos->sortByDesc($request->input('ordre'));
        }else{
            $photos = $photos->sortByDesc($request->input('ordre'));
        }
        return view('photos',['photos' => $photos]);
    }
    function admin(){
        return view('admin');
    }


    function logout(){
        Auth()->logout();
        return redirect()->route('index');
    }

    function albums(){
        $albums = Album::all();
        return view('albums',['albums'=>$albums]);
    }

    function supprimer($id){
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return back();
    }
}


<?php

namespace Projeto\Http\Controllers;

use Illuminate\Http\Request;
use Projeto\Pokemon;

class PokemonController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $pokemons = Pokemon::all();
            return response()->json($pokemons, 200);
        }
        return view('pokemons.index');
    }


    public function store(Request $request){

        if($request->ajax()){
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture');
            $pokemon->save();
        
            
                return response()->json([
                    "message" => "Pokemon corretly created.",
                    "pokemon" => $pokemon
                ], 200);
            

        }
    }

}

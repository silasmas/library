<?php

namespace App\Http\Controllers;

use App\Models\favori;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorefavoriRequest;
use App\Http\Requests\UpdatefavoriRequest;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.MesFavoris');
    }
    public function addFavories($id)
    {
        if (livreDisponible($id)==false) {
            return response()->json(['reponse' => false, 'msg' => "Ce livre est en ripture de stock car il est emprunter ou reserver. Merci de Patienter"]);                
        } else {  
        $fav = favori::create([
            'user_id' =>Auth::user()->id,
            'livre_id' =>$id,
        ]);
        if ($fav) {
            return response()->json(['reponse' => true, 'msg' => "Livre ajouter dans vos favories"]);
        } else {
            return response()->json(['reponse' => false, 'msg' => "Erreur d'enregistrement aux favoris."]);

        }
        }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorefavoriRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(favori $favori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(favori $favori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefavoriRequest $request, favori $favori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $element = favori::where([['livre_id', $id],["user_id",Auth::user()->id]])->delete();
        
        if ($element) {
            return response()->json(['reponse' => true, 'msg' => "Le livre est supprimé de vos favoris"]);
        } else {
            return response()->json(['reponse' => false, 'msg' => "Erreur suppression favoris."]);

        }
    }
}

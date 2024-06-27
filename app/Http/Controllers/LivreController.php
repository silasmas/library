<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelivreRequest;
use App\Http\Requests\UpdatelivreRequest;
use App\Models\livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view("admin.pages.home");
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
    public function store(StorelivreRequest $request)
    {
        //
    }
    public function search(Request $request)
    {
        // dd($request->search);
        $id = $request->search;
        $livres = livre::where("titre", "LIKE", "%" . "$id" . "%")
            ->orWhere("auteur", "LIKE", "%" . "$id" . "%")
            ->orWhere("isbn", "LIKE", "%" . "$id" . "%")
            ->orWhere("editeur", "LIKE", "%" . "$id" . "%")
            ->orWhere("description", "LIKE", "%" . "$id" . "%")->with("categories")->orderBy("titre")->get();
        // if ($livres->count() > 0) {
        //     return response()->json(['reponse' => true, 'msg' => "Merci d'être venu remettre le livre",'data' => $livres]);
        // } else {
        //     return response()->json(['reponse' => false, 'msg' => "Erreur pret."]);

        // }
        if ($livres->count() > 0) {
            return back()->with(['search' => $livres, 'id' => $request->search, "msg" => $livres->count() . " Information(s) trouvé(s)", "type" => "success"]);
        } else {
            return back()->with(['search' => $livres, 'id' => $request->search, "msg" => $livres->count() . " Information(s) trouvé(s)", "type" => "danger"]);

        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $livre = livre::with("favories", "consulter", "reserver")->where("id", $id)->orWhere("isbn", $id)->first();
        return view("admin.pages.detail", compact("livre"));

    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function gbooks(livre $livre)
    {

    }
    public function edit(livre $livre)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelivreRequest $request, livre $livre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(livre $livre)
    {
        //
    }
}

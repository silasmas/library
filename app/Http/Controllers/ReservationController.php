<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Http\Requests\StorereservationRequest;
use App\Http\Requests\UpdatereservationRequest;
use App\Models\livre;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorereservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        // $livre = livre::find($id);
        // $categorie->nom != $request->nom ? $categorie->nom = $request->nom : $categorie->nom;
        // $categorie->description != $request->description ? $categorie->description = $request->description : $categorie->description;
        // // dd($categorie->categorieil);
        // $categorie->save();
        // if ($categorie) {
        //     return response()->json(['reponse' => true, 'msg' => "Modification réussie"]);
        // } else {
        //     return response()->json(['reponse' => false, 'msg' => "Erreur d'enregistrement."]);

        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorereservationRequest;
use App\Models\reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.MesReservation');
    }
    public function addReservation($id)
    {
        if (livreDisponible($id) == false) {
            return response()->json(['reponse' => false, 'msg' => "Ce livre est en ripture de stock car il est emprunter ou reserver. Merci de Patienter"]);
        } else {
            if (reservation::where([['livre_id', $id], ["user_id", Auth::user()->id]])->exists()) {
                // L'enregistrement existe dans la base de données
                $elt = reservation::where([['livre_id', $id], ["user_id", Auth::user()->id], ["statu", '0']])->first();
                if ($elt) {
                    $pret = reservation::create([
                        'user_id' => Auth::user()->id,
                        'livre_id' => $id,
                        'statu' => '1',
                        'dateDebutReserver' => now(),
                        'dateFinReserver' => now()->addDay(),
                    ]);
                    if ($pret) {
                        return response()->json(['reponse' => true, 'msg' => "Reservation réussi, merci de passer à la date prévu!"]);

                    } else {
                        return response()->json(['reponse' => false, 'msg' => "Erreur de reservation"]);

                    }
                } else {
                    return response()->json(['reponse' => false, 'msg' => "Ce livre est toujours reserver par vous, merci de resepecter le delait!"]);

                }

            } else {
                $pret = reservation::create([
                    'user_id' => Auth::user()->id,
                    'livre_id' => $id,
                    'statu' => '1',
                    'dateDebutReserver' => now(),
                    'dateFinReserver' => now()->addDay(),
                ]);
                if ($pret) {
                    return response()->json(['reponse' => true, 'msg' => "Vous reservez ce livre pour une première fois, merci de respecter dans le delait!"]);

                } else {
                    return response()->json(['reponse' => false, 'msg' => "Erreur de pret"]);

                }
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
    public function destroy($id)
    {
        $element = reservation::where([['livre_id', $id],["user_id",Auth::user()->id],["statu","1"]])->first();
        // dd($element);
        $element->fill(
        [
        'statu'=>'0',
        'updated_at'=>now(),
        ]
        );
        $element->save();
        if ($element) {
            return response()->json(['reponse' => true, 'msg' => "Merci d'être venu remettre le livre"]);
        } else {
            return response()->json(['reponse' => false, 'msg' => "Erreur pret."]);

        }
    }
}

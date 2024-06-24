<?php

namespace App\Http\Controllers;

use App\Models\consulter;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreconsulterRequest;
use App\Http\Requests\UpdateconsulterRequest;

class ConsulterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.MesPret');
    }
    public function addPret($id)
    {
        if (consulter::where([['livre_id', $id],["user_id",Auth::user()->id]])->exists()) {
            // L'enregistrement existe dans la base de données
            $elt=consulter::where([['livre_id', $id],["user_id",Auth::user()->id],["statu",'0']])->first();
            if ($elt) {                
                $pret = consulter::create([
                    'user_id' =>Auth::user()->id,
                    'livre_id' =>$id,
                    'statu' =>'1',
                    'dateretour' =>now(),
                    'heure' =>'00:10:00',
                ]);
                if ($pret) {
                    return response()->json(['reponse' => true, 'msg' => "Vous prenez à nouveau ce livre, merci de remettre dans le delait!"]);                
                    
                } else {
                    return response()->json(['reponse' => false, 'msg' => "Erreur de pret"]);                
                    
                }
            } else {
                return response()->json(['reponse' => false, 'msg' => "Ce livre est toujours emprunter par de vous, merci de pensé à remettre dans le delait!"]);               
                
            }

        } else {
            $pret = consulter::create([
                'user_id' =>Auth::user()->id,
                'livre_id' =>$id,
                'statu' =>'1',
                'dateretour' =>now(),
                'heure' =>'00:10:00',
            ]);
            if ($pret) {
                return response()->json(['reponse' => true, 'msg' => "Vous prenez ce livre pour une première fois, merci de remettre dans le delait!"]);                
                
            } else {
                return response()->json(['reponse' => false, 'msg' => "Erreur de pret"]);                
                
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
    public function store(StoreconsulterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(consulter $consulter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(consulter $consulter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateconsulterRequest $request, consulter $consulter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $element = consulter::where([['livre_id', $id],["user_id",Auth::user()->id],["statu","1"]])->first();
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

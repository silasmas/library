<?php

namespace App\Http\Controllers;

use App\Models\livre;
use Illuminate\Http\Request;
use App\Http\Requests\StorelivreRequest;
use App\Http\Requests\UpdatelivreRequest;

class LivreController extends Controller
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
    public function store(StorelivreRequest $request)
    {
        //
    }
    public function search(Request $request)
    {
        $id=$request->search;
        $livres = livre::where("titre", "LIKE", "%"."$id"."%")
        ->orWhere("auteur", "LIKE", "%"."$id"."%")
        ->orWhere("isbn", "LIKE", "%"."$id"."%")
        ->orWhere("editeur", "LIKE", "%"."$id"."%")
        ->orWhere("description", "LIKE", "%"."$id"."%")->get();
        // dd($livres);
        return back()->with(['search'=> $livres,'id'=> $request->search]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $livre = livre::where("id",$id)->orWhere("isbn",$id)->first();
        return view("admin.pages.detail",compact("livre"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(livre $livre)
    {
        //
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

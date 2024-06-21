<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreabonnementRequest;
use App\Http\Requests\UpdateabonnementRequest;
use App\Models\abonnement;
use App\Models\livre;
use function Laravel\Prompts\search;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("site.index");
    }

    public function dashboard(Request $request)
    {
        $livres = livre::query();
        if ($search = $request->search) {
            $livres->where("titre", "LIKE","%", "{$search}","%")
                ->orWhere("auteur", "LIKE","%", "{$search}","%")
                ->orWhere("isbn", "LIKE","%", "{$search}","%")
                ->orWhere("editeur", "LIKE","%", "{$search}","%")
                ->orWhere("langue", "LIKE","%", "{$search}","%");
        }

        $livres = $livres->with("categories")->orderBy("titre")->get();
        // dd($livres[54]->categories[0]->nom);
        // $livres = $livres->take(20)->get();
        return view("admin.pages.library", compact("livres"));
    }
    public function admin(Request $request)
    {
        $livres = livre::query();
        if ($search = $request->search) {
            $livres->where("titre", "LIKE", "{$search}")
                ->orWhere("auteur", "LIKE", "{$search}")
                ->orWhere("isbn", "LIKE", "{$search}")
                ->orWhere("editeur", "LIKE", "{$search}")
                ->orWhere("langue", "LIKE", "{$search}");
        }
        $livres = $livres->take(20)->get();

        return view("admin.pages.home", compact("livres"));
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
    public function store(StoreabonnementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(abonnement $abonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(abonnement $abonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateabonnementRequest $request, abonnement $abonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(abonnement $abonnement)
    {
        //
    }
}

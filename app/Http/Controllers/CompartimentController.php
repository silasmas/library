<?php

namespace App\Http\Controllers;

use App\Models\compartiment;
use App\Http\Requests\StorecompartimentRequest;
use App\Http\Requests\UpdatecompartimentRequest;

class CompartimentController extends Controller
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
    public function store(StorecompartimentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(compartiment $compartiment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(compartiment $compartiment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecompartimentRequest $request, compartiment $compartiment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(compartiment $compartiment)
    {
        //
    }
}

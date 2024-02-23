<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeportesResource;
use App\Models\Deportes;
use App\Http\Requests\StoreDeportesRequest;
use App\Http\Requests\UpdateDeportesRequest;
use App\Http\Resources\DeportesCollection;

class DeportesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): DeportesCollection
    {
        $deportes = Deportes::all();
        return new DeportesCollection($deportes);
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
    public function store(StoreDeportesRequest $request)
    {
        return new StoreDeportesRequest(Deportes::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Deportes $deporte): DeportesResource
    {
        return new DeportesResource($deporte);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deportes $deportes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeportesRequest $request, Deportes $deportes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deportes $deportes)
    {
        //
    }
}

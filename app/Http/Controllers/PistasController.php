<?php

namespace App\Http\Controllers;

use App\Models\Pistas;
use App\Http\Requests\StorePistasRequest;
use App\Http\Requests\UpdatePistasRequest;
use App\Http\Resources\PistasCollection;
use App\Http\Resources\PistasResource;

class PistasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pistas = Pistas::all();

        return response()->json(new PistasCollection($pistas), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePistasRequest $request)
    {
        return response()->json(new PistasResource(Pistas::create($request->all())), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pistas $pista)
    {
        return response()->json(new PistasResource($pista), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pistas $pistas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePistasRequest $request, Pistas $pista)
    {
        $pista->update($request->all());
        return response()->json(new PistasResource($pista), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pistas $pista)
    {
        if (Pistas::find($pista->id)) {
            $pista->delete();
            return response()->json([
                'message' => 'Request successful',
                'deleted' => $pista
            ], 200);
        }
        return response()->json(['error' => 'Request failed, pista not found.'], 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeportesResource;
use App\Models\Deportes;
use App\Http\Requests\StoreDeportesRequest;
use App\Http\Requests\UpdateDeportesRequest;
use App\Http\Resources\DeportesCollection;
use Illuminate\Http\JsonResponse;

class DeportesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $deportes = Deportes::all();

        return response()->json(new DeportesCollection($deportes), 200);
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
    public function store(StoreDeportesRequest $request): JsonResponse
    {
        return response()->json(new DeportesResource(Deportes::create($request->all())), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deportes $deporte): JsonResponse
    {
        return response()->json(new DeportesResource($deporte), 200);
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
    public function update(UpdateDeportesRequest $request, Deportes $deporte)
    {
        $deporte->update($request->all());
        return response()->json(new DeportesResource($deporte), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deportes $deporte)
    {
        $deporte->delete();
        return response()->json(['message' => 'Request successful'], 200);
    }
}

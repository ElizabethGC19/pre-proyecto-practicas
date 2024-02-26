<?php

namespace App\Http\Controllers;

use App\Models\Socios;
use App\Http\Requests\StoreSociosRequest;
use App\Http\Requests\UpdateSociosRequest;
use App\Http\Resources\SociosCollection;
use App\Http\Resources\SociosResource;
use Illuminate\Http\JsonResponse;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $socios = Socios::paginate();

        return response()->json(new SociosCollection($socios), 200);
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
    public function store(StoreSociosRequest $request): JsonResponse
    {
        return response()->json(new SociosResource(Socios::create($request->all())), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Socios $socio): JsonResponse
    {
        return response()->json(new SociosResource($socio), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Socios $socio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSociosRequest $request, Socios $socio): JsonResponse
    {
        $socio->update($request->all());
        return response()->json(new SociosResource($socio), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Socios $socio): JsonResponse
    {
        if (Socios::find($socio->id)) {
            $socio->delete();
            return response()->json([
                'message' => 'Request successful',
                'deleted' => $socio
            ], 200);
        }
        return response()->json(['error' => 'Request failed, socio not found.'], 404);
    }
}

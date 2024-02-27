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
     * @OA\Get(
     *     path="/api/v1/pistas",
     *     tags={"Pistas"},
     *     summary="Get all the pistas",
     *     description="Returns all pistas as a JSON response",
     *     @OA\Response(
     *         response=200,
     *         description="Request successful",
     *     )
     * )
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
     * @OA\Post(
     *     path="/api/v1/pistas",
     *     tags={"Pistas"},
     *     summary="Create a new pista",
     *     description="Create a new pista and return it as a JSON response",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(property="deporte_id", type="integer",  example="6"),
     *                  @OA\Property(property="numero", type="integer",  example="6")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pista created successfully",
     *     )
     * )
     */
    public function store(StorePistasRequest $request)
    {
        return response()->json(new PistasResource(Pistas::create($request->all())), 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/pistas/{pista}",
     *     tags={"Pistas"},
     *     summary="Get a specific pista",
     *     description="Returns a specific sport as a JSON response",
     *     @OA\Parameter(
     *         name="pista",
     *         in="path",
     *         description="ID of the pista",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Request successful",
     *     )
     * )
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
     * @OA\Put(
     *     path="/api/v1/pistas/{pista}",
     *     tags={"Pistas"},
     *     summary="Update a specific pista",
     *     description="Update a specific pista and return it as a JSON         response",
     *     @OA\Parameter(
     *         name="pista",
     *         in="path",
     *         description="ID of the pista",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="deporte_id", type="integer",  example="6"),
     *                 @OA\Property(property="numero", type="integer",  example="6")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pista updated successfully",
     *     )
     * )
     */
    public function update(UpdatePistasRequest $request, Pistas $pista)
    {
        $pista->update($request->all());
        return response()->json(new PistasResource($pista), 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/pistas/{pista}",
     *     tags={"Pistas"},
     *     summary="Delete a specific pista",
     *     description="Delete a specific pista and return a JSON response",
     *     @OA\Parameter(
     *         name="pista",
     *         in="path",
     *         description="ID of the pista",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Pista deleted successfully",
     *             @OA\Property(property="message", type="string", example="Request successful"),
     *             @OA\Property(property="deleted", ref="#/App/Models/Pistas")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pista not found",
     *             @OA\Property(property="message", type="string", example="Error, pista not found"),
     *     ),
     * )
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

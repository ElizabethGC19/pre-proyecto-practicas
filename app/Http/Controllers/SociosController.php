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
     * @OA\Get(
     *     path="/api/v1/socios",
     *     tags={"Socios"},
     *     summary="Get all the socios",
     *     description="Returns all socios as a JSON response",
     *     @OA\Response(
     *         response=200,
     *         description="Request successful",
     *     )
     * )
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
     * @OA\Post(
     *     path="/api/v1/socios",
     *     tags={"Socios"},
     *     summary="Create a new socio",
     *     description="Create a new socio and return it as a JSON response",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(property="nombre", type="string",  example="Fátima"),
     *                  @OA\Property(property="edad", type="integer",  example="19")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Socio created successfully",
     *     )
     * )
    */
    public function store(StoreSociosRequest $request): JsonResponse
    {
        return response()->json(new SociosResource(Socios::create($request->all())), 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/socios/{socio}",
     *     tags={"Socios"},
     *     summary="Get a specific socio",
     *     description="Returns a specific socio as a JSON response",
     *     @OA\Parameter(
     *         name="socio",
     *         in="path",
     *         description="ID of the socio",
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
     * @OA\Put(
     *     path="/api/v1/socios/{socio}",
     *     tags={"Socios"},
     *     summary="Update a specific socio",
     *     description="Update a specific socio and return it as a JSON response",
     *     @OA\Parameter(
     *         name="socio",
     *         in="path",
     *         description="ID of the socio",
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
     *                  @OA\Property(property="nombre", type="string",  example="Fátima"),
     *                  @OA\Property(property="edad", type="integer",  example="19")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Socio updated successfully",
     *     )
     * )
    */
    public function update(UpdateSociosRequest $request, Socios $socio): JsonResponse
    {
        $socio->update($request->all());
        return response()->json(new SociosResource($socio), 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/socios/{socio}",
     *     tags={"Socios"},
     *     summary="Delete a specific socio",
     *     description="Delete a specific socio and return a JSON response",
     *     @OA\Parameter(
     *         name="socio",
     *         in="path",
     *         description="ID of the socio",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Socio deleted successfully",
     *             @OA\Property(property="message", type="string", example="Request successful"),
     *             @OA\Property(property="deleted", ref="#/App/Models/Socios")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Socio not found",
     *             @OA\Property(property="message", type="string", example="Error, socio not found"),
     *     ),
     * )
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

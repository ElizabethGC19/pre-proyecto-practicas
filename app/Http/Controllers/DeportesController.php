<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeportesResource;
use App\Models\Deportes;
use App\Http\Requests\StoreDeportesRequest;
use App\Http\Requests\UpdateDeportesRequest;
use App\Http\Resources\DeportesCollection;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="Polideportivo API",
 *     version="1.0.0",
 *     description="Polideportivo API"
     
 )
 * @OA\Server(
 *     url="http://localhost:8000",    
 )
 */
class DeportesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/deportes",
     *     tags={"Deportes"},
     *     summary="Get all the sports",
     *     description="Returns all sports as a JSON response",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     )
     * )
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
     * @OA\Post(
     *     path="/api/v1/deportes",
     *     tags={"Deportes"},
     *     summary="Create a new sport",
     *     description="Create a new sport and return it as a JSON response",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(property="nombre", type="string",  example="hockey")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Sport created successfully",
     *     )
     * )
     */
    public function store(StoreDeportesRequest $request): JsonResponse
    {
        return response()->json(new DeportesResource(Deportes::create($request->all())), 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/deportes/{deporte}",
     *     tags={"Deportes"},
     *     summary="Get a specific sport",
     *     description="Returns a specific sport as a JSON response",
     *     @OA\Parameter(
     *         name="deporte",
     *         in="path",
     *         description="ID of the sport",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     )
     * )
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
     * @OA\Put(
     *     path="/api/v1/deportes/{deporte}",
     *     tags={"Deportes"},
     *     summary="Update a specific sport",
     *     description="Update a specific sport and return it as a JSON         response",
     *     @OA\Parameter(
     *         name="deporte",
     *         in="path",
     *         description="ID of the sport",
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
     *                  @OA\Property(property="nombre", type="string",  example="hockey"),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sport updated successfully",
     *     )
     * )
     */
    public function update(UpdateDeportesRequest $request, Deportes $deporte)
    {
        $deporte->update($request->all());
        return response()->json(new DeportesResource($deporte), 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/deportes/{deporte}",
     *     tags={"Deportes"},
     *     summary="Delete a specific sport",
     *     description="Delete a specific sport and return a JSON response",
     *     @OA\Parameter(
     *         name="deporte",
     *         in="path",
     *         description="ID of the sport",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sport deleted successfully",
     *             @OA\Property(property="message", type="string", example="Request successful"),
     *             @OA\Property(property="deleted", ref="#/App/Models/Deportes")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Sport not found",
     *             @OA\Property(property="error", type="string", example="Request failed, deporte not found.")
     *     ),
     * )
    */
    public function destroy(Deportes $deporte)
    {
        if (Deportes::find($deporte->id)) {
            $deporte->delete();
            return response()->json([
                'message' => 'Request successful',
                'deleted' => $deporte
            ], 200);
        }
        return response()->json(['error' => 'Request failed, deporte not found.'], 404);
    }
}

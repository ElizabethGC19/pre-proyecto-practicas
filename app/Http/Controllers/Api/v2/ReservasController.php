<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Reservas;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\Api\v2\ReservasResource;


class ReservasController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/v1/reservas/{reserva}",
     *     tags={"Reservas"},
     *     summary="Get a specific reserva",
     *     description="Returns a specific reserva as a JSON response",
     *     @OA\Parameter(
     *         name="reserva",
     *         in="path",
     *         description="ID of the reserva",
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
    public function show(Reservas $reserva): JsonResponse
    {
        return response()->json(new ReservasResource($reserva), 200);
    }
}

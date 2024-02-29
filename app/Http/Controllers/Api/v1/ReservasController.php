<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Reservas;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ReservasResource;
use App\Http\Resources\ReservasCollection;
use App\Http\Requests\StoreReservasRequest;
use App\Http\Requests\UpdateReservasRequest;

class ReservasController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/reservas",
     *     tags={"Reservas"},
     *     summary="Get list of reservas",
     *     description="Get a paginated list of reservas or filter by date",
     *     @OA\Parameter(
     *         name="fecha",
     *         in="query",
     *         description="Filter by date",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             format="date"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Request successful"
     *     )
     * )
    */
    public function index(Request $request): JsonResponse
    {
        $reservas = Reservas::paginate();

        if ($request->query('fecha')) {
            $reservas = Reservas::whereDate('fecha', $request->query('fecha'))->join('pistas', 'pistas.id', '=', 'reservas.pista_id')
                ->join('socios', 'socios.id', '=', 'reservas.socio_id')
                ->join('deportes', 'deportes.id', '=', 'pistas.deporte_id')
                ->select(
                    'reservas.id as id',
                    'reservas.fecha as fecha',
                    'reservas.hora as hora',
                    'socios.nombre as socio_nombre',
                    'socios.edad as socio_edad',
                    'pistas.numero as pista_numero',
                    'deportes.nombre as pista_deporte'
                )
                ->get();
        }

        return response()->json(new ReservasCollection($reservas), 200);
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
     *     path="/api/v1/reservas",
     *     tags={"Reservas"},
     *     summary="Create a new reserva",
     *     description="Create a new reserva and return it as a JSON response",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(property="fecha", type="date",  example="2024-03-22"),
     *                  @OA\Property(property="hora", type="hour",  example="11:00"),
     *                  @OA\Property(property="socio_id", type="integer",  example="22"),
     *                  @OA\Property(property="pista_id", type="integer",  example="2")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Reserva created successfully",
     *     )
     * )
    */
    public function store(StoreReservasRequest $request): JsonResponse
    {
        $socioId = $request->input('socio_id');
        $fecha = $request->input('fecha');

        $reservasRealizadas = Reservas::where('socio_id', $socioId)
            ->whereDate('fecha', $fecha)
            ->count();

        if ($reservasRealizadas >= 3) {
            return response()->json(['error' => 'Request failed, already 3 bookings confirmed for ' . $fecha . '.'], 400);
        }
        return response()->json(new ReservasResource(Reservas::create($request->all())), 201);
    }

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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservas $reserva)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/api/v1/reservas/{reserva}",
     *     tags={"Reservas"},
     *     summary="Update a specific reserva",
     *     description="Update a specific reserva and return it as a JSON response",
     *     @OA\Parameter(
     *         name="reserva",
     *         in="path",
     *         description="ID of the reserva",
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
     *                  @OA\Property(property="fecha", type="date",  example="2024-03-22"),
     *                  @OA\Property(property="hora", type="hour",  example="11:00"),
     *                  @OA\Property(property="socio_id", type="integer",  example="22"),
     *                  @OA\Property(property="pista_id", type="integer",  example="2")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Reserva updated successfully",
     *     )
     * )
    */
    public function update(UpdateReservasRequest $request, Reservas $reserva): JsonResponse
    {
        $socioId = $request->input('socio_id');
        $fecha = $request->input('fecha');

        $reservasDeHoy = Reservas::where('socio_id', $socioId)
            ->whereDate('fecha', $fecha)
            ->count();

        if ($reservasDeHoy >= 3) {
            return response()->json(['error' => 'Request failed, already 3 bookings confirmed for today.'], 400);
        }
        $reserva->update($request->all());
        return response()->json(new ReservasResource($reserva), 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/reservas/{reserva}",
     *     tags={"Reservas"},
     *     summary="Delete a specific reserva",
     *     description="Delete a specific reserva and return a JSON response",
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
     *         description="Reserva deleted successfully",
     *             @OA\Property(property="message", type="string", example="Request successful"),
     *             @OA\Property(property="deleted", ref="#/App/Models/Reservas")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Reserva not found",
     *             @OA\Property(property="message", type="string", example="Error, reserva not found"),
     *     ),
     * )
    */
    public function destroy(Reservas $reserva): JsonResponse
    {
        if (Reservas::find($reserva->id)) {
            $reserva->delete();
            return response()->json([
                'message' => 'Request successful',
                'deleted' => $reserva
            ], 200);
            
        }
        return response()->json(['error' => 'Request failed, reserva not found.'], 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Socios;
use App\Models\Reservas;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ReservasResource;
use App\Http\Resources\ReservasCollection;
use App\Http\Requests\StoreReservasRequest;
use App\Http\Requests\UpdateReservasRequest;
use App\Models\Pistas;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
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
     * Display the specified resource.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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

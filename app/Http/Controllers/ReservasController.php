<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use App\Http\Requests\StoreReservasRequest;
use App\Http\Requests\UpdateReservasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    // public function store(StoreReservasRequest $request)
    // {
    //     //
    // }
    public function store(Request $request)
    {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'socio_id' => 'required',
            'pista_id' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        // Aplicar reglas de negocio adicionales
        if ($validator->passes()) {
            $socioId = $request->input('socio_id');
            $fecha = $request->input('fecha');
            $horaInicio = $request->input('hora_inicio');

            // Verificar si el socio ya tiene 3 reservas para este día
            $reservasHoy = Reservas::where('socio_id', $socioId)
                ->whereDate('fecha', $fecha)
                ->count();

            if ($reservasHoy >= 3) {
                return response()->json(['error' => 'El socio ya tiene 3 reservas para este día.'], 422);
            }

            // Verificar si el socio ya tiene una reserva para esta hora
            $reservaExistente = Reservas::where('socio_id', $socioId)
                ->where('fecha', $fecha)
                ->where(function ($query) use ($horaInicio) {
                    $query->where('hora_inicio', '<=', $horaInicio)
                        ->where('hora_fin', '>', $horaInicio);
                })
                ->orWhere(function ($query) use ($horaInicio) {
                    $query->where('hora_inicio', '<', $horaInicio)
                        ->where('hora_fin', '>=', $horaInicio);
                })
                ->count();

            if ($reservaExistente > 0) {
                return response()->json(['error' => 'El socio ya tiene una reserva para esta hora.'], 422);
            }
        } else {
            return response()->json(['error' => $validator->errors()->all()], 422);
        }

        // Si todas las validaciones pasan, crear la reserva
        $reserva = Reservas::create($request->all());

        return response()->json(['message' => 'Reserva creada con éxito.', 'reserva' => $reserva], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservas $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservasRequest $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservas $reservas)
    {
        //
    }
}

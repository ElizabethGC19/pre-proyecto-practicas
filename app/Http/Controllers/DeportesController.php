<?php

namespace App\Http\Controllers;

use App\Models\Deportes;
use App\Http\Requests\StoreDeportesRequest;
use App\Http\Requests\UpdateDeportesRequest;

class DeportesController extends Controller
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
    public function store(StoreDeportesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Deportes $deportes)
    {
        //
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
    public function update(UpdateDeportesRequest $request, Deportes $deportes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deportes $deportes)
    {
        //
    }
}
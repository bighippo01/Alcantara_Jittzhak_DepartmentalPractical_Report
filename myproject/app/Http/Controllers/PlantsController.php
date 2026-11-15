<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreplantsRequest;
use App\Http\Requests\UpdateplantsRequest;
use App\Models\plants;

class PlantsController extends Controller
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
    public function store(StoreplantsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(plants $plants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(plants $plants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplantsRequest $request, plants $plants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(plants $plants)
    {
        //
    }
}

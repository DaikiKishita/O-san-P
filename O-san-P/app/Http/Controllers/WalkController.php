<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalkRequest;
use App\Http\Requests\UpdateWalkRequest;
use App\Models\Walk;

class WalkController extends Controller
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
    public function store(StoreWalkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Walk $walk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Walk $walk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalkRequest $request, Walk $walk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Walk $walk)
    {
        //
    }
}

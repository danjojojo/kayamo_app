<?php

namespace App\Http\Controllers;

use App\Models\ServiceOptions;
use App\Http\Requests\StoreServiceOptionsRequest;
use App\Http\Requests\UpdateServiceOptionsRequest;

class ServiceOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServiceOptions::get(); // GET ALL REQUESTS

        return view('pages.services', ['services' => $services]);
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
    public function store(StoreServiceOptionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceOptions $serviceOptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceOptions $serviceOptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceOptionsRequest $request, ServiceOptions $serviceOptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceOptions $serviceOptions)
    {
        //
    }
}

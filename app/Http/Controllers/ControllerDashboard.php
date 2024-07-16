<?php

namespace App\Http\Controllers;

use App\Models\management;
use Illuminate\Http\Request;

class ControllerDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.home");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(management $management)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(management $management)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, management $management)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(management $management)
    {
        //
    }
}

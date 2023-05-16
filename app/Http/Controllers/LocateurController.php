<?php

namespace App\Http\Controllers;

use App\Models\locateur;
use Illuminate\Http\Request;

class LocateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locateurs=Locateur::all();
        return view('admin.mains-admin.locateurs.list', compact('locateurs'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(locateur $locateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(locateur $locateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, locateur $locateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(locateur $locateur)
    {
        //
    }
}
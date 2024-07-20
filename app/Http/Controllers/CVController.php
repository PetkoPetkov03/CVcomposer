<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\University;
use Illuminate\Http\Request;

class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = University::all();
        return view("index", ['universities' => $universities])->with("uniStoreUrl", 'uni.store');
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
    public function show(CV $cV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CV $cV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CV $cV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CV $cV)
    {
        //
    }
}
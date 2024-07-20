<?php

namespace App\Http\Controllers;

use App\Models\Tech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tech = Tech::all();

        return $tech;
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
        $validator = Validator::make($request->all(), [
            'tech_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        }

        try {
            $tech = new Tech();

            $tech->tech_name = $request->tech_name;

            $tech->save();

            return response()->json(["success" => true, "msg" => "New technology added!"]);
        }catch(\Exception $e) {
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tech $tech)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tech $tech)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tech $tech)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tech $tech)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Uni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = Uni::all();

        return $universities;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "uni_name" => 'required',
            "grade" => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        }

        try {
            $uni = Uni::create([
                "uni_name" => $request->uni_name,
                "grade" => $request->grade,
            ]);

            return response()->json(['success' => true, 'msg' => "University added successfully!"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Uni $university)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uni $university)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uni $university)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uni $university)
    {
        //
    }
}

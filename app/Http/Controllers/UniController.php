<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = University::all();

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
            $addUni = new University;
            $addUni->uni_name = $request->uni_name;
            $addUni->grade = $request->grade;

            $addUni->save();

            return response()->json(['success' => true, 'msg' => "University added successfully!"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, University $university)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        //
    }
}

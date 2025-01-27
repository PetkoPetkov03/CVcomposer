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
            Tech::create([
                "tech_name" => $request->tech_name,
            ]);

            return response()->json(["success" => true, "msg" => "New technology added!"]);
        }catch(\Exception $e) {
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }
}

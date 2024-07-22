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
}

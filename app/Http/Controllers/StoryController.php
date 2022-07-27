<?php

namespace App\Http\Controllers;

use App\Models\StoryTable;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "message" => "successfull",
            "data" => StoryTable::with('CategoryTable')->get()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $var = StoryTable::create([
            'category_id' => $request->category_id,
            'story' => $request->story,
            'name' => $request->name,
        ]);
        return response()->json([
            "message" => "Story Created Successfully",
            "data" => $var
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StoryTable $story)
    {
        return response()->json([
            "message" => "successfull",
            "data" => $story
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoryTable $story, Request $request)
    {
        $story->update(['story' => $request->story, 'name' => $request->name]);
        return response()->json([
            "message" => "Story Update Successfully",
            "data" => $story
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoryTable $story)
    {
        $story->delete();
        return response()->json([
            "message" => "Story Delete Successfully",
        ], 202);
    }
}

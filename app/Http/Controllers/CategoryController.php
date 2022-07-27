<?php

namespace App\Http\Controllers;

use App\Models\CategoryTable;
use App\Models\StoryTable;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            "data" => CategoryTable::get()
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
        $validity = CategoryTable::where('name', $request->name)->first();

        // $validity = $request->validate(['name' => 'unique:category_tables,name']);

        if ($validity) {
            return response()->json([
                "message" => "Category Already Exist!!!",
            ], 400);
        } else {
            $var = CategoryTable::create([
                'name' => $request->name,
            ]);
            return response()->json([
                "message" => "Category Created Successfully",
                "data" => $var
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTable $category)
    {
        return response()->json([
            "message" => "successfull",
            "data" => $category
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(CategoryTable $category, Request $request)
    {
        $validity = CategoryTable::where('name', $request->name)->first();

        if ($validity) {
            return response()->json([
                "message" => "Category Already Exist!!!",
            ], 400);
        } else {
            $category->update(['name' => $request->name]);
            return response()->json([
                "message" => "Category Update Successfully",
                "data" => $category
            ], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryTable $category)
    {
        if ($category->status == 'active') {
            $category->update(['status' => 'deactive']);
        } else {
            $category->update(['status' => 'active']);
        }

        return response()->json([
            "message" => "Category Delete Successfully",
        ], 202);
    }
}

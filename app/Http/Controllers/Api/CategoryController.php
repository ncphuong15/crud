<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try { 
            $categories = Category::orderBy('id', 'desc')->get();
            // $news = Category::findOrFail(6)->news;
            // return $news;
            return response()->json([
                'status' => 200,
                'message' => 'Success!',
                'data' => $categories
            ]);  
        } catch (Exception $e) {
            return 'Data Not Found';  
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            return response()->json([
                'status' => 200,
                'message' => 'Create Success',
                'data' => $category
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Create fail'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
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
    public function update(Request $request)
    {
        try {
            $category = Category::findorFail($request->id);
            $category->name = $request->name;
            $category->save();

            return response()->json([
                'status' => 200,
                'message' => 'Update success',
                'data' => $category
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Update fail'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $category = Category::findOrFail($request->id);
            $category->delete();
            $categories = Category::orderBy('id', 'desc')->get();
            
            return response()->json([
                'status' => 200,
                'message' => 'Delete success',
                'data' => $categories
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Delete fail'
            ]);
        }
    }
}

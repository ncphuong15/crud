<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $news = News::orderBy('id', 'desc')->get();
            // foreach ($news as $key => $new) {
            //     $new->category_id = $new->category->name;
            // }
            if (count($news) > 0) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Success',
                    'data' => $news
                ]);
            } else {
                return "Data Not Found";
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Error'
            ]);
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
            $news = new News(); 
            $news->name = $request->name;
            $news->preview_text = $request->preview_text;
            $news->detail_text = $request->detail_text;
            $news->category_id = $request->category_id;
            $news->save();

            return response()->json([
                'status' => 200,
                'message' => 'Add success',
                'data' => $news
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Add fail'
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
    public function edit(Request $request)
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
            $news = News::findorFail($request->id);
            $news->name = $request->name;
            $news->preview_text = $request->preview_text;
            $news->detail_text = $request->detail_text;
            // $news->category_id = $request->category_id;
            $news->save();

            return response()->json([
                'status' => 200,
                'message' => 'Update success',
                'data' => $news
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
            $news = News::findorFail($request->id);
            $news->delete();
            $news = News::orderBy('id', 'desc')->get();
            if (count($news) === 0 ) {
                $news = 'Data Not Found';
            }
            return response()->json([
                'status' => 200,
                'message' => 'Delete success',
                'data' => $news
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Delete fail'
            ]);
        }
    }
}

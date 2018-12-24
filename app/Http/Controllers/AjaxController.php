<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AjaxController extends Controller
{
    public function ajaxPagination(Request $request)
    {
        $data = Category::paginate(10);
  
        if ($request->ajax()) {
            return view('presult', compact('data'));
        }
  
        return view('ajaxPagination',compact('data'));
    }

    public function search(Request $request) {
    	$q = $request->q;
    	$data = Category::where('name', 'like', '%'.$q.'%')->paginate(5);
    	$data->appends(['q' => $q]);
    	// dd($data);
    	
    	if ($request->ajax()) {
            return view('presult', compact('data'));
        }

    	return view('pagination', compact('data'));
    }
}

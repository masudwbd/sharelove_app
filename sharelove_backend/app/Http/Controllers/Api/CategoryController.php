<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categoires = DB::table('categories')->get();
        return response()->json($categoires);
    }
}

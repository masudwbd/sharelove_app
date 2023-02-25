<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CommentController extends Controller
{
    public function store(Request $request){
        $data = array(
            'user_id' => $request->user_id,
            'pin_id' => $request->pin_id,
            'user_name' => $request->user_name,
            'user_image' => $request->user_picture,
            'comment' => $request->comment,
        );
        DB::table('comments')->insert($data);
        return response()->json($data);
    }

    public function comments($id){
        $comments = DB::table('comments')->where('pin_id' , $id)->get();

        return response()->json($comments);
    }
}

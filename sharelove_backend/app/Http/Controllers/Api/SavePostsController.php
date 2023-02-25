<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SavePostsController extends Controller
{
    public function saved_pins($id){
        $saved_pins = DB::table('saved_posts')->where('google_id' , $id)->get();
        return response()->json($saved_pins);
    }

    public function store(Request $request){
        $google_id = $request->google_id;
        $pin_id = $request->pin_id;

        $exists = DB::table('save_posts')->where('google_id', $google_id)->where('pin_id', $pin_id)->first();

        if($exists){
            return response()->json('already_exists');
        }else{
            $data = array(
                'google_id' => $google_id,
                'pin_id' => $pin_id
            );

            DB::table('saved_posts')->insert($data);
            return response()->json('success');
        }
    }

    public function posted_by($id){
        $author = DB::table('google_users')->where('google_id' , $id)->first();
        return response()->json($author);
    }

}

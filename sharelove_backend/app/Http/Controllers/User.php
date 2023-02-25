<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Image;
class User extends Controller
{
    public function store(Request $request){

        $user_exists = DB::table('google_users')->where('google_id' , $request->google_id)->first();

        if($user_exists){
            return response('success');
        }else{
            $data = array(
                'name' => $request->name,
                'image' => $request->image,
                'google_id' => $request->google_id
            );
    
            DB::table('google_users')->insert($data);
            return response('success');
        }
    }

    public function users(Request $request){
        $data = DB::table('all_users')->get();
        return response()->json($data);
    }

    public function user($id){
        $user = DB::table('google_users')->where('google_id' , $id)->first();
        return response()->json($user);
    }
}

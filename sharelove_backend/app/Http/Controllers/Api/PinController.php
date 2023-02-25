<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Str;
use Image;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function index(){
        $pins = DB::table('pins')->get();
        return response()->json($pins);
    }

    public function get_pin_by_category_id($id){
        $pins = DB::table('pins')->where('category_id' , $id)->get();
        return response()->json($pins);
    }

    public function get_pin_by_id($id){
        $pin = DB::table('pins')->where('id' , $id)->first();
        return response()->json($pin);
    }
    
    public function get_pin_by_poster_id($id){
        $pin = DB::table('pins')->where('posted_by' , $id)->get();
        return response()->json($pin);
    }

    public function store(Request $request){
        $data = array(
            'posted_by' => $request->posted_by,
            'title' => $request->title,
            'about' => $request->about,
            'destination' => $request->destination,
            'category_id' => $request->category_id,
            'image' => $request->image
        );

        // $slug = Str::slug($request->title . '-');
        // $image = $request->image;
        // $imageName = $slug . '.' . $image->getClientOriginalExtension();
        // Image::make($image)->save('backend/files/pins/' . $imageName);
        // $data['image'] = 'backend/files/pins/' . $imageName;

        DB::table('pins')->insert($data);
        return response()->json('success');
    }
}

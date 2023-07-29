<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function videoSearchByName(Request $request){
        $text = $request->input('text');
        $videos =  DB::table("contents")
        ->select("contents.user_id", "contents.title", 'contents.description','contents.duration','users.name as creator_name')
        ->join("users", "users.id", "=", "contents.user_id")
        ->where('title', 'LIKE', '%' . $text . '%')
        ->get();
        if ($videos->count() === 0) {
            return  response()->json([
                'message' =>"no videos found"
            ]);
        }
        else{
            return response()->json($videos);
        }
    }
    public function videoSearchById(Request $request){
        $id = $request->input('id');
        $video =  DB::table("contents")
        ->select("contents.user_id", "contents.title", 'contents.description','contents.duration','users.name as creator_name')
        ->join("users", "users.id", "=", "contents.user_id")
        ->where('contents.id','=', $id)
        ->get();
        if ($video->count() === 0) {
            return  response()->json([
                'message' => "no video found"
            ]);
        }
        else{
            return response($video);
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Follows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    //get video info by name
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
    // get video info my id
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

    // get users info my name
    public function usersByName(Request $request){
        $Name = $request->input('name');
        
        $users = DB::table("users")
        ->select("id", "name", "email", "created_at")
        ->where('name', 'LIKE', '%' . $Name . '%')
        ->get();
        foreach($users as $user){
            $Followed = DB::table("Follows")->select('subscriber_id', 'creator_id')->where("creator_id", "=", $user->id)->get();
            $user->followers_count = count($Followed);
        }
        foreach($users as $user){
            $saved = DB::table("likes")->select('user_id', 'content_id')->where("content_id", "=", $user->id)->get();
            $user->Saved_videos_count = count($saved);
        }
        if ($users->count() === 0) {
            return response()->json([
                'message' => "No users found",
            ]);
        } 
        else {
            return response()->json($users);
        }
    }

    // get users info my id
    public function usersById(Request $request){
        $id = $request->input('id');
        $users = DB::table("users")
        ->select("id", "name", "email", "created_at") 
        ->where('id','=', $id)
        ->get();
        foreach($users as $user){
            $Followed = DB::table("Follows")->select('subscriber_id', 'creator_id')->where("creator_id", "=", $user->id)->get();
            $user->followers_count = count($Followed);
        }
        foreach($users as $user){
            $saved = DB::table("likes")->select('user_id', 'content_id')->where("content_id", "=", $user->id)->get();
            $user->Saved_videos_count = count($saved);
        }
        if ($users->count() === 0) {
            return response()->json([
                'message' => "No users found",
            ]);
        } 
        else {
            return response()->json($users);
        }
    }
}
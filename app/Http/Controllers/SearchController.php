<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;

class SearchController extends Controller
{
    public function Search(Request $request){
        $text = $request->input('text');
        $videos =  DB::table("contents")
        ->select("id","user_id","title",'description','path','thumbnail','duration','created_at')
        ->where('title', 'LIKE', '%' . $text . '%')
        ->get();
        $creators = DB::table("users")
        ->select("id","name",'profile_picture')
        ->where("name", 'LIKE','%'. $text . '%')
        ->get();

        $FollowList = DB::table("Follows")->select("creator_id")->where('subscriber_id','=',auth()->id())->get();
        
        return view("Searchpage",["Videos" => $videos , "creators" => $creators , 'FollowList' => $FollowList]);
    }

    public function OpenChannel($id){
        $channel = User::findOrFail($id);
        // dd($channel);
        $creatorlist = DB::table("users")->select("name","profile_picture")->where('id','=', $id)->get();
        $creator=$creatorlist[0];
        $videoList =  DB::table("contents")->
                select("id","title",'user_id','path','thumbnail', 'description','duration','created_at')->
                where('user_id','=',$id)->
                get();
        $FollowList = DB::table("Follows")->select("creator_id")->where('subscriber_id','=',auth()->id())->get();


        return view('channel',["FollowList" => $FollowList ,"channel" => $channel,"creator" => $creator , "videoList" => $videoList]);
    } 
}

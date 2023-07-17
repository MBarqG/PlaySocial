<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\Contents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function upload(Request $request){
        $videofilds = $request->validate([
        'title'=> ['required'],
        'description' => ['required'],
        ]);
        $vid = $request->file('path');

        $video_name = time() . "." . $vid->getClientOriginalExtension();
        $validation['filename'] = $video_name;
        $vid->storeAs('videos', $video_name);
        $path = Storage::path("videos/" . $video_name);
        $getID3 = new \getID3;
        $video_file = $getID3->analyze($path);
        $duration_seconds = $video_file['playtime_seconds'];


        $video_name = time() . "." . $vid->getClientOriginalExtension();
        $validation['filename'] = $video_name;
        $path = $vid->storeAs('videos', $video_name ,'public');

        $videofilds['user_id'] = auth()->id();
        $videofilds['path'] = 'storage/'.$path;
        $videofilds['duration'] = $duration_seconds;


        $PP = $request->file("thumbnail");
        $PP_name = time() . "." . $PP->getClientOriginalExtension();
        $validation['filename'] = $PP_name;
        $path = $PP->storeAs('thumbnail', $PP_name ,'public');

        $videofilds['thumbnail'] = 'storage/'.$path;
        
        Contents::create($videofilds);

        return redirect("Profile");
    }

    //open video 
    public function OpenContent(Request $request,$id){
        $video = Contents::findOrFail($id);
        $creatorlist = DB::table("users")->select("name","profile_picture")->where('id','=', $video->user_id)->get();
        $creator=$creatorlist[0];
        $videoList =  DB::table("contents")->
                select("id","title",'user_id','path','thumbnail','duration')->
                where('user_id','=',auth()->id())->
                get();

        $comments = DB::table("comments")->
        select('user_id','comment_text','created_at')->
        where('content_id','=',$id)->
        get();

        return view('content',['video' => $video, "creator" => $creator , "videoList" => $videoList ,'comments' => $comments]);
    }

    public function Postcomment(Request $request){
        $commentfilds = $request->validate([
            'comment_text'=> ['required'],
            'content_id'=>['required']
            ]);
        $commentfilds['user_id'] = auth()->id();
        comments::create($commentfilds);
        return redirect()->back();
    }
}

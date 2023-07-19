<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        return view("Searchpage",["Videos" => $videos , "creators" => $creators]);
    }
}

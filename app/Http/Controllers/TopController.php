<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Prefecture;
use Auth;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function top()
    {
        $posts = Post::limit(12)->orderBy('created_at', 'desc')->get();
        $prefecture1 = Prefecture::where('region_id', '1')->first();
        $prefectures2 = Prefecture::where('region_id', '2')->get();
        $prefectures3 = Prefecture::where('region_id', '3')->get();
        $prefectures4 = Prefecture::where('region_id', '4')->get();
        $prefectures5 = Prefecture::where('region_id', '5')->get();
        $prefectures6 = Prefecture::where('region_id', '6')->get();
        $prefectures7 = Prefecture::where('region_id', '7')->get();
        $prefectures8 = Prefecture::where('region_id', '8')->get();
        
        return view('top')->with([
            'posts' => $posts,
            'prefecture1' => $prefecture1,
            'prefectures2' => $prefectures2,
            'prefectures3' => $prefectures3,
            'prefectures4' => $prefectures4,
            'prefectures5' => $prefectures5,
            'prefectures6' => $prefectures6,
            'prefectures7' => $prefectures7,
            'prefectures8' => $prefectures8,
        ]);
    }
    
    public function search(Request $request)
    {
        $search_words = $request->search_words;
        $serect_prefectures = $request->serect_prefectures;
            if ($search_words == '') {
                $posts = Post::where('prefecture_id', $serect_prefectures)->get();
            } elseif ($serect_prefectures == '') {
                $posts = Post::where('caption', $search_words)->get();
            } else {
                $posts = Post::where('prefecture_id', $serect_prefectures)->where('caption', $search_words)->get();
            }
            
        return view('search', ['posts' => $posts, 'serect_prefectures' => $serect_prefectures]);
    }
}

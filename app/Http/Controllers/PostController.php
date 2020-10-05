<?php

namespace App\Http\Controllers;

use App\Post;
use App\Prefecture;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function new()
    {
        $prefectures = Prefecture::all();
        // new.blade.php 表示
        return view('post/new', ['prefectures' => $prefectures]);
    }
    
    public function show(Request $request)
    {
        $validator = Validator::make($request->all() , ['caption' => 'required|max:255', 'post_image_path' => 'required', 'prefecture_id' => 'required']);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        // Postモデル定義
        $post = new Post;
        $request->post_image_path->storeAs('public/post_images', $post->id . '.jpg');
        $post->post_image_path = $post->id . '.jpg';
        $post->caption = $request->caption;
        $post->date = $request->date;
        $post->prefecture_id = $request->prefecture_id;
        $post->user_id = Auth::user()->id;
        
        $post->save();
        
        return redirect('/posts/' .$request->id);
    }
    
    /* public function new()
    {
        return view('post/new');
    } */
}

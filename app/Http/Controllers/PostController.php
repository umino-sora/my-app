<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Prefecture;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function edit()
    {
        $prefectures = Prefecture::all();
        // edit.blade.php 表示
        return view('post/edit', ['prefectures' => $prefectures]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , ['caption' => 'required|max:255', 'post_image_path' => 'required', 'prefecture_id' => 'required']);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // Postモデル定義
        $post = new Post;
        $path = $request->file('post_image_path')->storeAs('public/post_images', date('Y-m-d-H_i_s') . Auth::user()->id . '.jpg');
        $post->post_image_path = date('Y-m-d-H_i_s') . Auth::user()->id . '.jpg';
        $post->caption = $request->caption;
        $post->date = $request->date;
        $post->prefecture_id = $request->prefecture_id;
        $post->user_id = Auth::user()->id;
        
        $post->save();
        $post->id;
        
        return redirect("/posts/$post->id");
    }
    
    /* public function view($post_id)
    {
        $post = Post::where('id', $post_id)->get();
        \Log::info(print_r($post->all(),true));
        \Log::info($post_id);
        // view.blade.php 表示
        return view('post/view', ['post' => $post]);
    } */
    
    public function view()
    {
        $post = Post::where('user_id', Auth::user()->id)->latest()->first();
        $prefecture = Prefecture::where('code', $post->prefecture_id)->get();
        
        return view('post/view', ['post' => $post], ['prefecture' => $prefecture]);
    }
}

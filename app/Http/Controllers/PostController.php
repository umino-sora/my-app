<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Prefecture;
use App\Like;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit()
    {
        $prefectures = Prefecture::all();
        // edit.blade.php 表示
        return view('post/edit', ['prefectures' => $prefectures]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , ['caption' => 'required|max:255', 'post_image_path' => 'required', 'date' => 'required', 'prefecture_id' => 'required']);
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
    
    public function view($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $prefecture = Prefecture::where('code', $post->prefecture_id)->first();
    
        \Log::info(print_r($post->all(),true));
        \Log::info(print_r($post->user_id,true));
        \Log::info(print_r($post->id,true));
        return view('post/view', ['post' => $post], ['prefecture' => $prefecture]);
    }
    
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect('/mypage/{user_id}');
    }
    
    public function likedBy($user)
    {
        return Like::where('user_id', $user->id)->where('post_id', $this->id);
    }
    
    public function prefIndex($prefecture_id)
    {
        $posts = Post::where('prefecture_id',$prefecture_id)->get();
    }
    
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Like;
use App\Post;
use App\Prefecture;
use Auth;
use Validator;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();
        $likes = Like::where('user_id', $user->id)->latest()->get();
        // likes.blade.php 表示
        return view('user/likes', ['likes' => $likes]);
    }
    
    public function store(Request $request)
    {
        // Likeモデル作成
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return redirect("/posts/$like->post_id");
    }
    
    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect("/posts/$like->post_id");
    }
    
}

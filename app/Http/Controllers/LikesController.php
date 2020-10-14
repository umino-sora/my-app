<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Auth;
use Validator;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        // Likeモデル作成
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return redirect('/mypage/{user_id}');
    }
    
    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/mypage/{user_id}');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function top()
    {
        $posts = Post::limit(12)->orderBy('created_at', 'desc')->get();
        return view('top', ['posts' => $posts]);
    }
}

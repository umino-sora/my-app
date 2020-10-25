<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Prefecture;
use Auth;
use Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->latest()->get();
        $prefectures = Prefecture::all();
            
        return view('user/mypage', ['user' => $user, 'posts' => $posts , 'prefectures' => $prefectures]);
    }
    
    public function userpage($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $posts = Post::where('user_id', $user->id)->latest()->get();
        $prefectures = Prefecture::all();
            
        return view('user/mypage', ['user' => $user, 'posts' => $posts , 'prefectures' => $prefectures]);
    }
    
    public function edit()
    {
        $user = Auth::user();
        
        return view('user/edit', ['user' => $user]);
    }
    
    public function update(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'user_name' => 'required|string|max:30',
            'user_password' => 'required|string|min:6|confirmed',
            ]);
            
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $user = User::find($request->id);
        $user->name = $request->user_name;
        if ($request->profile_image_path !=null) {
            $request->profile_image_path->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_image_path = $user->id . '.jpg';
        }
        $user->introduction = $request->introduction;
        $user->password = bcrypt($request->user_password);
        $user->save();

        return redirect('/mypage/{user_id}');
    }
    
}

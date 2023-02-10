<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);
        // dd($data,Auth::user()->id);
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'You post is considerated with successfully');
    }
}

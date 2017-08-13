<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class RedirectPageController extends Controller
{
    //
    public function start(){
        $posts = Post::get();
        return view('welcome' , compact('posts'));
    }
}

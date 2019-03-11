<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
     //   $users = \App\User::find(2)->posts; //get posts from user id 2
       // $post = \App\Post::find(2);
      //echo $post->users->name;
      
        $posts = \App\Post::where('post_type', 'article')->orderBy('post_date', 'desc')->limit(3)->get(); //get all posts
        return view('welcome',array(
            'posts' => $posts
            ));
    }
}

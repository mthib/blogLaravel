<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    function index() {
        $posts = \App\Post::where('post_type', 'article')->orderBy('post_date', 'desc')->get(); //get all posts
        return view('articles',array(
            'posts' => $posts
            ));
    }

    function show($post_name) {
        $post = \App\Post::where('post_name',$post_name)->first(); //get post
        $comments = \App\Comment::where('post_id',$post->id)->get(); //get comments
        return view('posts/single',array( //Pass the post to the view
        'post' => $post,
        'comments' => $comments
        ));
    }
    public function store($post_name)
    {
        $comment = new \App\Comment(); //on instancie un nouveau projet
        $comment->post_id = request('post_id');
        $comment->comment_name = request('comment_name'); //on set le titre avec la donnée envoyée du formulaire
        $comment->comment_email = request('comment_email');
        $comment->comment_content = request('comment_content');
        $comment->comment_date = date("Y-m-d H:i:s");
        $comment->timestamps = false;
        $comment->save(); // on enregistre dans la base
        return redirect('/articles/'.$post_name); // méthode pour rediriger vers une autre url (en get par défaut)
    }

}

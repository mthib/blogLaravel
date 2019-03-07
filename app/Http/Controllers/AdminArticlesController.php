<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class AdminArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index() {
        
        $posts = \App\Post::where('post_type', 'article')->orderBy('post_date', 'desc')->get(); //get all posts
        return view('admin/articles',array(
            'posts' => $posts
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Post::select('post_category')->where('post_category', '<>', null)->groupBy('post_category')->get();
        return view('admin/create',array(
            'categories' => $categories
            ));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $post = new \App\Post(); //on instancie un nouveau projet
        $post->post_author = 2;
        $post->post_status = "publish";
        $post->post_type = "article";
        $post->post_name = $this->createAlias(request('post_title'));
        $post->post_title = request('post_title'); //on set le titre avec la donnée envoyée du formulaire
        $post->post_category = request('post_category');
        $post->post_content = request('post_content');
        $post->post_date = date("Y-m-d H:i:s");
        $post->timestamps = false;
        $post->save(); // on enregistre dans la base
        return redirect('/adminArticles'); // méthode pour rediriger vers une autre url (en get par défaut)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = \App\Post::find($id);
        return view('admin/article',array(
            'post' => $post
            ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = \App\Post::select('post_category')->where('post_category', '<>', null)->groupBy('post_category')->get();
        $post = \App\Post::find($id);
        return view('admin/edit',array(
            'post' => $post,
            'categories' => $categories
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $post = \App\Post::find($id);
        $post->post_author = 2;
        $post->post_status = "publish";
        $post->post_type = "article";
        $post->post_name = $this->createAlias(request('post_title'));
        $post->post_title = request('post_title'); //on set le titre avec la donnée envoyée du formulaire
        $post->post_category = request('post_category');
        $post->post_content = request('post_content');
        $post->post_date = date("Y-m-d H:i:s");
        $post->timestamps = false;
        $post->save(); // on enregistre dans la base

        return redirect('/adminArticles'); // méthode pour rediriger vers une autre url (en get par défaut)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // delete
       $post = \App\Post::find($id);
       $post->delete();

        return redirect('/adminArticles');
    }

    public function createAlias($chaine) {

		$chaine = trim($chaine);
 
		$chaine = htmlentities($chaine, ENT_NOQUOTES, 'UTF-8');
	 
		$patterns = array(
			/* lettres speciales : 'é' => 'e', 'ç' => 'c' */
			'#&([A-Za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#',
	 
			/* ligatures : 'œ' => 'oe' */
			'#&([A-Za-z]{2})(?:lig);#',
	 
			/* caracteres speciaux restant : '&' => '', '?' => '' */
			'#&[^;]+;#',
			'#([^a-z0-9/]+)#i',
		);
	 
		$remplacements = array(
			'\1',
			'\1',
			'',
			'-',
		);
	 
		$chaine = preg_replace($patterns, $remplacements, $chaine);
		$chaine = strtolower($chaine);
	 
		return $chaine;
	}
}

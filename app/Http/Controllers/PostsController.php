<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;

use DB;

class PostsController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('posts.index', []);
  }

  public function create(Request $request)
  {
    return view('posts.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $post = Post::findOrFail($id);
    return view('posts.add', [
      'model' => $post    ]);
  }

  public function show(Request $request, $id)
  {
    $post = Post::findOrFail($id);
    return view('posts.show', [
      'model' => $post    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM posts a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE post_author LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','post_author','post_date','post_content','post_title','post_status','post_name','post_type','post_category',);
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    $orderby = "Order By " . $order . " " . $dir;

    $sql = $select.$presql.$orderby." LIMIT ".$start.",".$len;
    //------------------------------------

    $qcount = DB::select("SELECT COUNT(a.id) c".$presql);
    //print_r($qcount);
    $count = $qcount[0]->c;

    $results = DB::select($sql);
    $ret = [];
    foreach ($results as $row) {
      $r = [];
      foreach ($row as $value) {
        $r[] = $value;
      }
      $ret[] = $r;
    }

    $ret['data'] = $ret;
    $ret['recordsTotal'] = $count;
    $ret['iTotalDisplayRecords'] = $count;

    $ret['recordsFiltered'] = count($ret);
    $ret['draw'] = $_GET['draw'];

    echo json_encode($ret);

  }


  public function update(Request $request) {
    //
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $post = null;
  if($request->id > 0) { $post = Post::findOrFail($request->id); }
  else {
    $post = new Post;
  }


  
    $post->id = $request->id?:0;
    
  
      $post->post_author = $request->post_author;
  
  
      $post->post_date = $request->post_date;
  
  
      $post->post_content = $request->post_content;
  
  
      $post->post_title = $request->post_title;
  
  
      $post->post_status = $request->post_status;
  
  
      $post->post_name = $request->post_name;
  
  
      $post->post_type = $request->post_type;
  
  
      $post->post_category = $request->post_category;
  
    //$post->user_id = $request->user()->id;
  $post->save();

  return redirect('/posts');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $post = Post::findOrFail($id);

  $post->delete();
  return "OK";

}


}

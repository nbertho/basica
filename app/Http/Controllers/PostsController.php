<?php
namespace App\Http\Controllers;
use App\Http\Models\Post as PostsMdl;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller {

  public function index() {
    $posts = PostsMdl::all();
    return $posts;
  }

  public function findLimit($limit = 10) {
    $posts = PostsMdl::orderBy('created_at', 'DESC')->where('categories_id', '!=', 1)->take($limit)->get();
    return $posts;
  }

  public function findFooterPosts() {
    $posts = DB::table('posts')->whereBetween('id', [1, 3])->get();
    return $posts;
  }

  public function showAction($id) {
    $post = PostsMdl::find($id);
    return View::make('posts.show',compact('post'));
  }
}

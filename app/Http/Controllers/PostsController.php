<?php
namespace App\Http\Controllers;
use App\Http\Models\Post as PostsMdl;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller {

  /**
   * Renvois les données de toutes les posts
   *
   * @return  array     Tableau contenant des objets avec les données des posts
   */
  public function index() {
    $posts = PostsMdl::all();
    return $posts;
  }

  /**
   * Renvois les données d'un certain nombre de posts (par defaut 10) trié par date de création décroissante
   *
   * @param   int  $limit    Nombre de post a renvoyer
   *
   * @return  array          Tableau contenant des objets avec les données des posts
   */
  public function findLimit( int $limit = 10) {
    $posts = PostsMdl::orderBy('created_at', 'DESC')->where('categories_id', '!=', 1)->take($limit)->get();
    return $posts;
  }

  /**
   * Renvois les posts concernant le footer (id = [1, 2, 3])
   *
   * @return  array     Tableau contenant des objets avec les données des posts du footer
   */
  public function findFooterPosts() {
    $posts = DB::table('posts')->whereBetween('id', [1, 3])->get();
    return $posts;
  }

  /**
   * Renvois les posts vers la vue du flux RSS
   *
   * @return  view    renvois la variable $data (array d'objet) vers la vue rss.feed
   */
  public function feedRss() {
    $data = PostsMdl::orderBy('created_at', 'DESC')->where('categories_id', '!=', 1)->get();
    return response()->view('rss.feed', compact('data'))->header('Content-Type', 'text/xml');
  }

  /**
   * [showAction description]
   *
   * @param   int  $id  id du post a renvoyer
   *
   * @return  view    renvois la variable $post (objet) vers la vue posts.show
   */
  public function showAction(int $id) {
    $post = PostsMdl::find($id);
    return View::make('posts.show',compact('post'));
  }
}

<?php
namespace App\Http\Controllers;
use App\Http\Models\Categorie as CategoriesMdl;
use App\Http\Models\Post as PostsMdl;
use Illuminate\Support\Facades\View;

class CategoriesController extends Controller {

  /**
   * Renvois les données de toutes les categories
   *
   * @return  array  Tableau contenant des objets avec les données des categories
   */
  public function index() {
    $categories = CategoriesMdl::all();
    return $categories;
  }

  /**
   * Renvois les données de toutes les posts étant dans la categorie $id
   *
   * @param   int  $id  id de la categorie
   *
   * @return  view    Tableau contenant des objets avec les données des posts
   */
  public function showAction($id) {
    $categorie = CategoriesMdl::find($id);
    $posts = PostsMdl::where('categories_id', '=', $id)->get();
    return View::make('categories.show',compact(['categorie', 'posts']));
  }

}

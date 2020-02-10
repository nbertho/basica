<?php
namespace App\Http\Controllers;
use App\Http\Models\Tag as TagsMdl;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller {

  /**
   * Renvois les données de toutes les tags
   *
   * @return  array     Tableau contenant des objets avec les données des tags
   */
  public function index() {
    $tags = TagsMdl::all();
    return $tags;
  }

  /**
   *  Renvois les données du tag ayant l'id $id
   *
   * @param   int  $projetId  id du tag a renvoyer
   *
   * @return  obj             Objet contenant des objets avec les données d'un tag
   */
  public function find( int $projetId) {
    $tags = DB::table('projets_has_tags')->join('tags', 'projets_has_tags.tags_id', '=', 'tags.id')->where('projets_id', '=', $projetId)->get();
    return $tags;
  }

}

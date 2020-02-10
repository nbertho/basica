<?php
namespace App\Http\Controllers;
use App\Http\Models\Projet as ProjetsMdl;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class ProjetsController extends Controller {

  /**
   * Renvois les données de toutes les projets
   *
   * @return  array     Tableau contenant des objets avec les données des projets
   */
  public function index() {
    $projets = ProjetsMdl::all();
    return $posts;
  }

  /**
   * Renvois les données d'un certain nombre de projets trié par date de création décroissante
   *
   * @param   int  $limit    Nombre de projet a renvoyer
   *
   * @return  array          Tableau contenant des objets avec les données des projets
   */
  public function find( int $limit) {
    $projets = ProjetsMdl::all()->take($limit);
    return $projets;
  }

  /**
   * Renvois les données du projet $id
   *
   * @param   int  $id  id du projet a renvoyer
   *
   * @return  obj       Objet contenant les données du projet $id
   */
  public function findOne( int $id) {
    $projets = ProjetsMdl::find($id);
    return $projets;
  }

  /**
   * Renvois les données des projets mis en avant (mise_en_avant = 1)
   *
   * @return  array          Tableau contenant des objets avec les données des projets
   */
  public function findHighlighted() {
    $projets = ProjetsMdl::all()->where('mise_en_avant', '=', 1);
    return $projets;
  }

  /**
   * Renvois un certain nombre ($limit) de projets n'étannt pas mis en avant (mise_en_avant != 1)
   *
   * @param   int  $limit  nombre de projets à renvoyer
   *
   * @return  array          Tableau contenant des objets avec les données des projets
   */
  public function findNotHighlighted( int $limit) {
    $projets = ProjetsMdl::orderBy('created_at', 'DESC')->where('mise_en_avant', '!=', 1)->take($limit)->get();
    return $projets;
  }

  /**
   * Affiche le projet $id
   *
   * @param   int  $id   id du projet à renvoyer
   *
   * @return  view       Renvois la variable $projet vers la vue projets.show
   */
  public function showAction( int $id) {
    $projet = ProjetsMdl::find($id);
    return View::make('projets.show',compact('projet'));
  }

  /**
   * Affiche les projets ayant des tags similaires
   *
   * @param   int  $id  id du projet
   *
   * @return  array          Tableau contenant des objets avec les données des projets
   */
  public function findRelated( int $id) {
    // Créations de tableau vide
      $tagsId = [];
      $projetsArray = [];
      $projetsIdArray = [];
    // On met toutes les id des tags du projet dans le tableau $tagsId
      $tagsProjet = DB::table('projets_has_tags')->select('tags_id')->where('projets_id', '=', $id)->get();
      foreach ($tagsProjet as $tagId) {
        array_push($tagsId , $tagId->tags_id);
      }
    // On met toutes les id des projets ayant les mêmes tags que le projet de base dans le tableau $projetsArray
      foreach ($tagsId as $tag) {
        $projetsId = DB::table('projets_has_tags')->select('projets_id')->where('tags_id', '=', $tag)->where('projets_id', '!=', $id)->get();
        foreach ($projetsId as $projet) {
          array_push($projetsArray, $projet->projets_id);
        }
      }
    // On trie en fonction du nombre d'occurences
      $projetsIdArray = array_count_values($projetsArray);
      arsort($projetsIdArray);
    // On retourne les 4 id de projets retenues
      $similarProjetId = array_keys($projetsIdArray);
      $similarProjetId = array_slice($similarProjetId, 0, 4);
      return $similarProjetId;
  }

}

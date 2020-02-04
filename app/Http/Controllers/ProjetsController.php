<?php
namespace App\Http\Controllers;
use App\Http\Models\Projet as ProjetsMdl;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class ProjetsController extends Controller {

  public function index() {
    $projets = ProjetsMdl::all();
    return $posts;
  }

  public function find($limit) {
    $projets = ProjetsMdl::all()->take($limit);
    return $projets;
  }

  public function findOne($id) {
    $projets = ProjetsMdl::find($id);
    return $projets;
  }

  public function findHighlighted() {
    $projets = ProjetsMdl::all()->where('mise_en_avant', '=', 1);
    return $projets;
  }

  public function findNotHighlighted($limit) {
    $projets = ProjetsMdl::all()->where('mise_en_avant', '!=', 1)->take($limit);
    return $projets;
  }

  public function showAction($id) {
    $projet = ProjetsMdl::find($id);
    return View::make('projets.show',compact('projet'));
  }

  public function findRelated($id) {
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
    // On retourne les 3 id de projetsz retenues
      $similarProjetId = array_keys($projetsIdArray);
      $similarProjetId = array_slice($similarProjetId, 0, 4);
      return $similarProjetId;
  }

}

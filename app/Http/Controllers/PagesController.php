<?php
namespace App\Http\Controllers;
use App\Http\Models\Page as PagesMdl;
use Illuminate\Support\Facades\View;

class PagesController extends Controller {

  /**
   * Redirige vers la page dont l'id = $id
   *
   * @param   int  $idPage  id de la page a rechercher
   *
   * @return  view        Renvois vers la page demandée (id = 1 par défaut)
   */
  public function redirectToPage(int $idPage = 1) {
    $homeRequest = PagesMdl::find($idPage);
    $slug = $homeRequest['slug'];
    return redirect()->route('pages.show', ['id' => $idPage, "slug" => $slug]);
}

  /**
   * Renvois les données de toutes les pages
   *
   * @return  array   Tableau contenant des objets avec les données des pages
   */
  public function index() {
    $pages = PagesMdl::all();
    return $pages;
  }

  /**
   * Redirige vers pages.show avec les infos de la page $id
   *
   * @param   int  $id   id de la page a afficher
   *
   * @return  view       Renvois de $page vers la vue pages.show
   */
  public function showAction(int $id) {
    $page = PagesMdl::find($id);
    return View::make('pages.show',compact('page'));
  }

}
